import CustomElement from "../lib/custom-element.js";

class PredictionForm extends CustomElement {
  connectedCallback() {
    this.$refs.form.addEventListener('submit', event => {
      event.preventDefault()

      this.$refs.predictionContainer.innerHTML = null

      const data = {
        hairinessColor: this.$refs.form.elements['hairiness-color'].value
      }

      fetch('/api/predict-drink', {
        method: 'post',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
      })
        .then(response => response.json())
        .then(data => this.drawChart(data))
    })
  }

  drawChart(data) {
    const predictionResult = document.createElement('app-prediction-result')
    predictionResult.setAttribute('prediction', JSON.stringify(data))

    this.$refs.predictionContainer.append(predictionResult)
  }

  render() {
    return `
      <style>
          @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
      </style>

      <form data-ref="form" class="mb-5">
        <div class="mb-3">
          <label for="hairiness-color">Couleur de cheveux / barbe</label>
          <select
            id="hairiness-color"
            name="hairiness-color"
            is="app-hairiness-color-select"
            class="form-select"
            required>
          </select>
        </div>

        <footer class="d-grid gap-2">
            <button type="submit" class="btn btn-lg btn-success">Let's go 😎</button>
        </footer>
      </form>

      <div class="d-flex justify-content-center" data-ref="predictionContainer"></div>
    `
  }
}

customElements.define('app-prediction-form', PredictionForm)
