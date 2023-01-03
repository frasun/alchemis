// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './patterns/**/*.php',
  ],
  safelist: ['grid', 'gap-3', 'grid-cols-2', 'grid-cols-3', 'grid-cols-4'],
  theme: {
    colors: {
      dark: '#223728',
      green: '#75B84E',
      grey: '#e3e3e3',
      greyDark: '#808080',
      greyLight: '#FEFEFE',
      white: '#fff',
      'grey-1': '#afafaf',
      'grey-2': '#cbcbcb',
      'grey-3': '#707070',
      'grey-4': '#D8D8D8',
      'grey-5': '#eaeaea',
      red: '#C41414',
      transparent: 'rgba(255, 255, 255, 0)',
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    },
    fontFamily: {
      sans: ['Poppins', 'sans-serif'],
    },
    spacing: {
      0: '0px',
      0.5: '0.5rem', // 8px
      0.75: '0.75rem', // 12px
      1: '1rem', // 16px
      2: '1.5rem', // 20px
      3: '2rem', // 32px
      4: '2.5rem', // 40px
      5: '3.75rem', // 60px
      6: '4.5rem', // 72px
      7: '5rem', // 80px
      8: '6rem', // 96px
      9: '7.5rem', // 120px
      10: '10rem', // 160px
      13: '13rem', // 208px
    },
    lineHeight: {
      headings: '0.9',
      none: '1',
      tight: '1.25',
      normal: '1.75',
      radioLabel: '2',
      label: '2.75',
    },
    fontSize: ({theme}) => ({
      sm: ['0.75rem'], // 12px
      base: ['0.9375rem', {lineHeight: theme('lineHeight.normal')}], // 15px
      md: ['1.125rem'], // 18px
      lg: ['1.375rem'], // 22px
      xlg: ['1.75rem'], // 28px
      xl: ['2.5rem'], // 40px
      '2xl': ['3.75rem'], // 60px
    }),
    opacity: {
      0: '0',
      60: '0.6',
      80: '0.8',
      100: '1',
    },
    borderRadius: {
      DEFAULT: '2.35rem',
      full: '9999px',
      none: '0px',
    },
    boxShadow: {
      DEFAULT: '4px 4px 15px rgb(0 0 0 / 0.16)',
    },
    transitionDuration: {
      DEFAULT: '300ms',
    },
    extend: {
      backgroundImage: {
        footer: 'url(../images/bg-footer.png)',
        maz1: 'url(../images/bg-maz-1.png)',
        maz2: 'url(../images/bg-maz-2.png)',
        maz3: 'url(../images/bg-maz-3.png)',
        maz4: 'url(../images/bg-maz-4.png)',
        maz5: 'url(../images/bg-maz-5.png)',
        maz6: 'url(../images/bg-maz-6.png)',
      },
      backgroundPosition: {
        'header-mobile': '80%',
        homepage: '100% 30%',
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.dark'),
            '--tw-prose-bullets': theme('colors.green'),
            p: {
              padding: 0,
            },
            maxWidth: 'none',
            h3: {
              textTransform: 'uppercase',
            },
            a: {
              fontWeight: 'normal',
              textDecoration: 'none',
              color: theme('colors.greyDark'),
            },
          },
        },
      }),
    },
    container: ({theme}) => ({
      center: true,
      padding: {
        DEFAULT: theme('spacing.1'),
        lg: theme('spacing.4'),
        xl: theme('spacing.6'),
      },
    }),
  },
  plugins: [require('@tailwindcss/typography')],
};
