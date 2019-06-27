module.exports = {
  theme: {
    extend: {
        colors: {
            'regal-blue': '#243c5a',
            'soft-black': '#4a4a4a',
            'smoke-darkest': 'rgba(0, 0, 0, 0.9)',
            'smoke-darker': 'rgba(0, 0, 0, 0.75)',
            'smoke-dark': 'rgba(0, 0, 0, 0.6)',
            'smoke': 'rgba(0, 0, 0, 0.5)',
            'smoke-light': 'rgba(0, 0, 0, 0.4)',
            'smoke-lighter': 'rgba(0, 0, 0, 0.25)',
            'smoke-lightest': 'rgba(0, 0, 0, 0.1)',

            'transparent': 'transparent',
        }
    }
  },
  variants: {
    borderRadius: ['responsive', 'hover', 'focus'],
    borderStyle: ['responsive', 'hover', 'focus'],
    borderWidth: ['responsive', 'hover', 'focus'],
    fontStyle: ['responsive', 'hover', 'focus'],
    visibility: ['responsive', 'group-hover'],
  },
  plugins: []
}
