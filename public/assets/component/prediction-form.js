import CustomElement from "../lib/custom-element.js";

class PredictionForm extends CustomElement {
  connectedCallback() {
    this.$refs.form.addEventListener('submit', event => {
      event.preventDefault()

      const data = {
        hairinessColor: this.$refs.form.elements['hairiness-color'].value || undefined,
        birthday: this.$refs.form.elements['birthday'].value || undefined,
        size: this.$refs.form.elements['size'].value || undefined,
        characters: Array.from(this.$refs.form.elements['characters'].selectedOptions).map(option => option.value),
      }

      if (data.birthday) {
        const now = new Date()
        data.birthday = new Date(data.birthday)

        if (now.getFullYear() - data.birthday.getFullYear() < 18) {
          return alert('Oops tu sembles trop jeune pour boire de la bière ! Reviens après tes 18 ans :)')
        }
      }

      fetch('/api/predict-drink', {
        method: 'post',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
        mode: 'cors',
      })
        .then(response => response.json())
        .then(data => this.drawChart(data))
    })
  }

  drawChart(data) {
    const predictionResult = document.createElement('app-prediction-result')
    predictionResult.setAttribute('prediction', JSON.stringify(data))
    predictionResult.addEventListener('close', () => this.reset())

    this.$refs.form.classList.add('d-none')
    this.$refs.predictionContainer.append(predictionResult)
  }

  reset() {
    this.$refs.form.reset()
    this.$refs.form.classList.remove('d-none')
    this.$refs.predictionContainer.innerHTML = null
  }

  render() {
    return `
      <style>
          @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
      </style>

      <form data-ref="form">
        <div class="mb-3">
          <label for="hairiness-color">Couleur de cheveux / barbe</label>
          <select
            id="hairiness-color"
            name="hairiness-color"
            is="app-hairiness-color-select"
            class="form-select">
          </select>
        </div>

        <div class="mb-3">
          <label for="birthday">Date de naissance (On regarde pas 🫣)</label>
          <input id="birthday" name="birthday" class="form-control" type="date">
        </div>

        <div class="mb-3">
          <label for="size">Taille (environ hein)</label>
          <input id="size" name="size" class="form-control" type="number" min="100" step="1" placeholder="150">
        </div>

        <div class="mb-3">
          <label for="characters">Un ou plusieurs traits de caractère</label>
          <select
            id="characters"
            name="characters"
            is="app-character-select"
            class="form-select"
            multiple>
          </select>
        </div>

        <footer class="d-grid gap-2">
            <button type="submit" class="btn btn-lg btn-success">Let's go 😎</button>
        </footer>
      </form>

      <div data-ref="predictionContainer"></div>
    `
  }
}

customElements.define('app-prediction-form', PredictionForm)
