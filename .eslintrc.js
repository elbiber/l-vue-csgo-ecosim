module.exports = {
    env: {
        browser: true,
        es6: true
    },
    extends: [
        //"eslint:recommended",
        //"plugin:vue/essential"
        "plugin:vue/recommended"
    ],
    globals: {
        Atomics: "readonly",
        SharedArrayBuffer: "readonly"
    },
    parserOptions: {
        ecmaVersion: 2018,
        sourceType: "module"
    },
    plugins: ["vue"],
    rules: {
        "no-console": process.env.NODE_ENV === "production" ? "error" : "off",
        "no-debugger": process.env.NODE_ENV === "production" ? "error" : "off",
        indent: ["error", 4],
        "no-tabs": "warn",
        "linebreak-style": ["error", "unix"],
        "object-curly-spacing": ["error", "always"],
        quotes: ["error", "single"],
        semi: ["error", "never"],
        "comma-dangle": ["error", "never"],
        "no-new": "off",
        "arrow-body-style": ["error", "as-needed"],
        "arrow-parens": ["error", "as-needed"],
        "no-alert": "warn",
        "max-len": ["error", { code: 220 }],
        "no-param-reassign": ["error", { props: false }],
        "no-underscore-dangle": "off",
        "no-var": "error",
        "no-unused-vars:": "off",
        "no-undef": "off"
    }
};
