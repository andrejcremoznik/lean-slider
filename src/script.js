(function (d) {
  const showSlide = (newIdx, items) => {
    items.forEach((item, idx) => {
      if (idx === newIdx) {
        item.classList.add('lean-slider__item_active')
      } else {
        item.classList.remove('lean-slider__item_active')
      }
    })
    return newIdx
  }

  const LeanSlider = (node) => {
    node.classList.add('lean-slider_init', ('ontouchstart' in window) ? 'lean-slider_touch' : 'lean-slider_pointer')

    const items = node.querySelectorAll('.lean-slider__item')

    let active = showSlide(0, items)

    node.addEventListener('click', (e) => {
      e.preventDefault()
      if (e.target.classList.contains('lean-slider-js')) {
        switch (e.target.dataset.do) {
          case 'prev':
            active = showSlide((active - 1 + items.length) % items.length, items)
            break
          case 'next':
            active = showSlide((active + 1) % items.length, items)
            break
        }
      }
    }, { capture: true })
  }

  d.querySelectorAll('.lean-slider').forEach(LeanSlider)
})(document)
