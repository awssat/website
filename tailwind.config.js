module.exports = {
  theme: {
    extend: {
      fontFamily: {
        sans: ["Bitter", 'system-ui', '-apple-system', 'BlinkMacSystemFont', "'Segoe UI'", 'Roboto', "'Helvetica Neue'", 'Arial', "'Noto Sans'", 'sans-serif', "'Apple Color Emoji'", "'Segoe UI Emoji'", "'Segoe UI Symbol'", "'Noto Color Emoji'"],
      },
      colors: {
        awssat: '#4931A5',
        'awssat-light': '#8166E5',
      },
        fontSize: {
          md: '	1.0625rem',
        }
    },
    boxShadow: {
        link: '0 -4px 0 0 rgba(248, 220, 74, .7) inset',
    },
  },
  variants: {
    translate: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    textColor: ['responsive', 'hover', 'focus', 'group-hover', 'visited'],
    textDecoration: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
  },
  plugins: [],

}
