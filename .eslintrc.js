module.exports = {
  root: true,
  extends: ['@roots/eslint-config/sage'],
  rules: {
    'react/react-in-jsx-scope': 'off',
    'react/jsx-filename-extension': [1, {extensions: ['.js', '.jsx']}],
  },
};
