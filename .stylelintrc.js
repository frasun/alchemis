module.exports = {  
  overrides: [
    {
      files: ["*.scss", "**/*.scss"],
      customSyntax: require("postcss-scss"),
      extends: [
        "@roots/sage/stylelint-config",
        "@roots/bud-tailwindcss/stylelint-config"
      ],
    }
  ]
}