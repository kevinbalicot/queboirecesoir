class CharacterSelect extends HTMLSelectElement {
  connectedCallback() {
    fetch('/assets/data/characters.json')
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

customElements.define('app-character-select', CharacterSelect, { extends: 'select' })
