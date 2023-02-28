// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './patterns/**/*.php',
  ],
  safelist: [
    'grid',
    'gap-3',
    'grid-cols-2',
    'grid-cols-3',
    'grid-cols-4',
    'lg:grid-cols-2',
    'lg:grid-cols-3',
    'lg:grid-cols-4',
    'items-center',
    'lg:w-3/4'
  ],
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
      homeBg: '#dbdbdb',
    },
    screens: {
      xs: '480px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    },
    fontFamily: {
      sans: ['Poppins', 'sans-serif'],
    },
    spacing: ({theme}) => ({
      0: '0px',
      0.25: '0.25rem', // 8px
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
      40: '10rem',
    }),
    lineHeight: {
      headings: '0.9',
      none: '1',
      tight: '1.25',
      narrow: '1.5',
      normal: '1.75',
      radioLabel: '2',
      label: '2.75',
    },
    fontSize: ({theme}) => ({
      sm: ['0.75rem'], // 12px
      sml: ['0.875rem'], // 14px
      baseSm: ['0.9375rem'], // 15px
      base: ['1rem', {lineHeight: theme('lineHeight.normal')}], // 16px
      md: ['1.125rem'], // 18px
      lg: ['1.375rem'], // 22px
      xlg: ['1.75rem'], // 28px
      xl: ['2rem'], // 32px
      xl2: ['2.5rem'], // 40px
      '1/5xl': ['3rem'], // 48px
      '2xl': ['3.75rem'], // 60px
    }),
    fontWeight: {
      normal: '500',
      semibold: '600',
      bold: '600',
    },
    opacity: {
      0: '0',
      30: '0.3',
      60: '0.6',
      80: '0.8',
      90: '0.9',
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
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.dark'),
            maxWidth: 'none',
            '--tw-prose-bullets': theme('colors.green'),
            p: {
              padding: 0,
            },
            a: {
              fontWeight: 'normal',
              textDecoration: 'none',
              color: theme('colors.greyDark'),
            },
            ul: {
              marginTop: 0,
            },
            h1: {
              fontSize: theme('fontSize.1/5xl'),
              fontWeight: theme('fontWeight.normal'),
              marginTop: '1.5em',
              marginBottom: '1em',
            },
            h2: {
              fontSize: theme('fontSize.xl'),
              fontWeight: theme('fontWeight.normal'),
              marginTop: '1.5em',
              marginBottom: '1em',
            },
            h3: {
              fontSize: theme('fontSize.lg'),
              fontWeight: theme('fontWeight.normal'),
              marginTop: '1.5em',
              marginBottom: '1em',
            },
            h4: {
              fontSize: theme('fontSize.md'),
              fontWeight: theme('fontWeight.semibold'),
              marginTop: '1.5em',
              marginBottom: '1em',
            },
            h5: {
              fontSize: theme('fontSize.base'),
              fontWeight: theme('fontWeight.semibold'),
              marginTop: '1.5em',
              marginBottom: '1em',
            },
            h6: {
              fontSize: theme('fontSize.base'),
              fontWeight: theme('fontWeight.semibold'),
              marginTop: '1.5em',
              marginBottom: '1em',
            },
            figure: {
              marginTop: 0,
              marginBottom: 0,
            },
          },
        },
      }),
    },
    container: ({theme}) => ({
      center: true,
      padding: {
        DEFAULT: theme('spacing.2'),
        lg: theme('spacing.4'),
        xl: theme('spacing.6'),
      },
    }),
  },
  plugins: [require('@tailwindcss/typography')],
};
