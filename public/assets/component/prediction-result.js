import CustomElement from "../lib/custom-element.js";

class PredictionResult extends CustomElement {
  constructor() {
    super();

    this.chart = null
    this.colors = {
      'IPA': '#F29F05',
      'Stout': '#732306',
      'Pilsner': '#F2B705',
      'Belgian Strong Ale': '#F27405',
      'Saison': '#BF4904',
      'Weizenbier': '#F2B705',
    }

    this.backgroundColors = {
      'IPA': 'rgba(242, 159, 5, .3)',
      'Stout': 'rgba(115, 35, 6, .3)',
      'Pilsner': 'rgba(242, 183, 5, .3)',
      'Belgian Strong Ale': 'rgba(242, 116, 5, .3)',
      'Saison': 'rgba(191, 73, 4, .3)',
      'Weizenbier': 'rgba(242, 183, 5, .3)',
    }
  }

  get prediction() {
    return JSON.parse(this.getAttribute('prediction'))
  }

  connectedCallback() {
    const data = this.prediction
    let max = 0
    let drinkPrediction

    for (let style in data) {
      if (data[style] > max) {
        drinkPrediction = style
        max = data[style]
      }
    }

    this.$refs.drinkPrediction.innerText = drinkPrediction
    this.$refs.drinkPrediction.style = `color: ${this.colors[drinkPrediction]}`

    const dataSet = {
      labels: Object.keys(data),
      datasets: [
        {
          label: 'Prédiction',
          data: Object.values(data),
          borderColor: this.colors[drinkPrediction],
          backgroundColor: this.backgroundColors[drinkPrediction],
        }
      ]
    }

    this.chart = new Chart(
      this.$refs.predictionResult,
      {
        type: 'radar',
        data: dataSet,
        options: {
          responsive: true,
        },
      }
    )
  }

  disconnectedCallback() {
    if (this.chart) {
      this.chart.destroy()
    }
  }

  render() {
    return `
      <style>
        @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
      </style>

      <div class="text-center">
        <h3 class="mb-4">Tu boirais pas une <span data-ref="drinkPrediction"></span> par hasard ? Allez santé !</h3>
        <canvas data-ref="predictionResult" width="800"></canvas>
      </div>
    `
  }
}

customElements.define('app-prediction-result', PredictionResult)
