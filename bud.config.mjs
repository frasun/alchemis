// @ts-check

/**
 * Build configuration
 *
 * @see {@link https://bud.js.org/guides/configure}
 * @param {import('@roots/bud').Bud} app
 */
export default async (app) => {
  app
    /**
     * Application entrypoints
     */
    .entry({
      app: ['@scripts/app', '@styles/app'],
      editor: ['@scripts/editor', '@styles/editor'],
    })

    /**
     * Directory contents to be included in the compilation
     */
    .assets(['images'])

    /**
     * Matched files trigger a page reload when modified
     */
    .watch(['resources/views/**/*', 'app/**/*'])

    /**
     * Proxy origin (`WP_HOME`)
     */
    .proxy('http://alchemis.local')

    /**
     * Development origin
     */
    .serve('http://localhost:3000')

    /**
     * URI of the `public` directory
     */
    .setPublicPath('../')

    /**
     * Generate WordPress `theme.json`
     *
     * @note This overwrites `theme.json` on every build.
     */
    .wpjson.settings({
      color: {
        custom: false,
        customGradient: false,
        defaultPalette: false,
        defaultGradients: false,
      },
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
        },
      },
      spacing: {
        padding: true,
        units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
        // @ts-ignore
        spacingSizes: [
          {
            size: '1rem',
            slug: '20',
            name: '2',
          },
          {
            size: '2rem',
            slug: '30',
            name: '3',
          },
          {
            size: '2.5rem',
            slug: '40',
            name: '4',
          },
          {
            size: '3.75rem',
            slug: '50',
            name: '5',
          },
          {
            size: '4.5rem',
            slug: '60',
            name: '6',
          },
          {
            size: '6rem',
            slug: '70',
            name: '7',
          },
          {
            size: '7.5rem',
            slug: '80',
            name: '8',
          },
        ],
      },
      typography: {
        customFontSize: false,
      },
    })
    .useTailwindColors()
    .useTailwindFontFamily()
    .useTailwindFontSize()
    .enable();
};
