// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    "./index.php", 
    "./app/**/*.php", 
    "./resources/**/*.{php,vue,js}", 
    "./patterns/**/*.php"
  ],
  theme: {
    colors: {
      'dark': '#223728',
      'green': '#75B84E',
      'grey': '#CBCBCB',
      'white': '#fff'
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1320px',
    },
    fontFamily: {
      sans: [
        'Poppins',
        'sans-serif'
      ]
    },
    spacing: {
      1: '1rem', // 16px
      2: '2rem', // 32px
      3: '3rem', // 48px
      4: '4rem', // 64px
      5: '5rem', // 80px
      6: '6rem', // 96px
      7: '7rem', // 112px
      10: '10rem' // 160px
    },
    lineHeight: {
      tight: '1.25',
      normal: '1.75'
    },
    fontSize: ({theme}) => ({
      base: ['1.25rem', { lineHeight: theme('lineHeight.normal') }],  // 20px / 25px
      lg: ['1.5625rem'],  // 25px
      xl: ['3.4375rem'],  // 55px
    }),
    extend: {
      backgroundImage: {
        footer: "url(../images/bg-footer.png)"
      }
    },
    container: ({theme}) => ({
      center: true,
      padding: theme('spacing.1')
    })
  },
  plugins: []
};
