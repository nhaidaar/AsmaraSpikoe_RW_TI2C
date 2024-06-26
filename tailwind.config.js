/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        SFPro: ["sf-pro", "sans"]
      },
      colors: {
        "Neutral": {
          "0": "#ffffff",
          "10": "#f0f0f0",
          "20": "#e8e8e8",
          "30": "#bbbbbb",
          "40": "#7f7f7f",
          "50": "#575757",
          "Base": "#1b1b1b",
          "60": "#171717",
          "70": "#121212",
          "80": "#0e0e0e",
          "90": "#090909",
          "100": "#050505",
        },
        "Primary": {
          "10": "#dbd6d6",
          "20": "#c3bbbb",
          "30": "#a49898",
          "40": "#867676",
          "50": "#685454",
          "Base": "#4a3232",
          "60": "#3e2a2a",
          "70": "#312121",
          "80": "#251919",
          "90": "#191111",
          "100": "#0f0a0a",
        },
        "Additional": {
          "10": "#f3f0e8",
          "20": "#eae6d8",
          "30": "#e0dac4",
          "40": "#d6ceb1",
          "50": "#cbc19d",
          "Base": "#c1b58a",
          "60": "#a19773",
          "70": "#81795c",
          "80": "#615b45",
          "90": "#403c2e",
          "100": "#27241c",
        },
        "Success": {
          "10": "#d2ebda",
          "20": "#b4dec1",
          "30": "#8fcea2",
          "40": "#6abe83",
          "50": "#44ad64",
          "Base": "#1f9d45",
          "60": "#1a833a",
          "70": "#15692e",
          "80": "#104f23",
          "90": "#0a3417",
          "100": "#061f0e",
        },
        "Error": {
          "10": "#f2dbdb",
          "20": "#eac2c2",
          "30": "#dfa4a4",
          "40": "#d58686",
          "50": "#ca6767",
          "Base": "#c04949",
          "60": "#a03d3d",
          "70": "#803131",
          "80": "#602525",
          "90": "#401818",
          "100": "#260f0f",
        },
        "Warning": {
          "10": "#f2f0db",
          "20": "#eae6c2",
          "30": "#dfd9a4",
          "40": "#d5cd86",
          "50": "#cac067",
          "Base": "#c0b449",
          "60": "#a0963d",
          "70": "#807831",
          "80": "#605a25",
          "90": "#403c18",
          "100": "#26240f",
        },
      },
    },
  },
  plugins: [

  ],

}