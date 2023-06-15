export default class CustomElement extends HTMLElement {
  constructor(options = {}) {
    super();

    const _self = this;
    const { mode = 'open' } = options;

    this.attachShadow({ mode });

    const template = this.render();
    if (template instanceof HTMLTemplateElement) {
      this.shadowRoot.appendChild(template.content.cloneNode(true));
    } else {
      const tmpTemplate = document.createElement('template');
      tmpTemplate.innerHTML = template;

      this.shadowRoot.appendChild(tmpTemplate.content.cloneNode(true));
    }

    this.$refs = {};
    this.$binds = {};
    this.$scope = new Proxy({}, {
      set(obj, prop, value) {
        if (undefined !== _self.scopeChangedCallback && typeof _self.scopeChangedCallback === 'function') {
          _self.scopeChangedCallback(prop, obj[prop], value);
        }

        if (undefined !== _self.$binds[prop] && _self.$binds[prop] instanceof HTMLElement) {
          _self.$binds[prop].innerText = value;
        }

        return Reflect.set(...arguments);
      }
    });

    this.selectAll('[data-ref]').forEach(el => this.$refs[el.dataset.ref] = el);
    this.selectAll('[data-bind]').forEach(el => this.$binds[el.dataset.bind] = el);
  }

  scopeChangedCallback(prop, oldValue, newValue) {
  }

  select(selectors) {
    return this.shadowRoot.querySelector(selectors);
  }

  selectAll(selectors) {
    return this.shadowRoot.querySelectorAll(selectors);
  }

  render() {
    return '<slot></slot>';
  }
}
