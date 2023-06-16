class HairinessColorSelect extends HTMLSelectElement {
  connectedCallback() {
    this.innerHTML = '<option></option>'

    fetch('/assets/data/hairiness-colors.json', { mode: 'cors' })
      .then(response => response.json())
      .then(data => {
        this.append(
          ...data.map(({ key, name }) => {
            const option = document.createElement('option')
            option.value = key
            option.innerText = name

            return option
          })
        )
      })
  }
}

customElements.define('app-hairiness-color-select', HairinessColorSelect, { extends: 'select' })
