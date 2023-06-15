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

    this.beerStyles = []
  }

  get prediction() {
    return JSON.parse(this.getAttribute('prediction'))
  }

  displayChart(data, drinkPrediction) {
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
          /*scale: {
            ticks: {
              beginAtZero: true,
              max: 1,
              min: 0,
              stepSize: 0.1
            }
          }*/
        },
      }
    )
  }

  displayPrediction(drinkPrediction) {
    this.$refs.drinkPrediction.innerText = drinkPrediction
    this.$refs.drinkPrediction.style = `color: ${this.colors[drinkPrediction]}`

    const beerStyle = this.beerStyles.find(({ key }) => key === drinkPrediction)
    if (beerStyle) {
      this.$refs.drinkPredictionDescription.innerText = beerStyle.description
    }
  }

  connectedCallback() {
    this.$refs.cancelButton.addEventListener('click', () => this.dispatchEvent(new CustomEvent('close')))
    const data = this.prediction
    let max = 0
    let drinkPrediction

    for (let style in data) {
      if (data[style] > max) {
        drinkPrediction = style
        max = data[style]
      }
    }

    fetch('/assets/data/beer-styles.json')
      .then(response => response.json())
      .then(beerStyles => {
        this.beerStyles = beerStyles
        this.displayPrediction(drinkPrediction)
        this.displayChart(data, drinkPrediction)
      })
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

      <h3 class="mb-4">Tu boirais pas une <span data-ref="drinkPrediction"></span> par hasard ?</h3>
      <p class="alert alert-info"><span data-ref="drinkPredictionDescription"></span> <strong>Allez santé ! 🍻</strong></p>
      <div>
          <div class="col-md-6 offset-md-3">
              <canvas data-ref="predictionResult"></canvas>
          </div>
      </div>
      <button data-ref="cancelButton" type="button" class="btn btn-sm btn-secondary mt-3">Hum ... Je ne suis pas convaincu</button>
    `
  }
}

customElements.define('app-prediction-result', PredictionResult)
