/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'baloo': ['"Baloo 2"', 'cursive']
      },      
      backgroundImage: {
        'login-background': "url('/img/background.jpg')",
      },
      height: {
        "10vh": "10vh",
        "20vh": "20vh",
        "30vh": "30vh",
        "40vh": "40vh",
        "50vh": "50vh",
        "60vh": "60vh",
        "70vh": "70vh",
        "80vh": "80vh",
        "90vh": "90vh",
        "100vh": "100vh",
      },
      width: {
        "5vw": "5vw",
        "7vw": "7vw",
        "10vw": "10vw",
        "20vw": "20vw",
        "30vw": "30vw",
        "40vw": "40vw",
        "50vw": "50vw",
        "60vw": "60vw",
        "70vw": "70vw",
        "80vw": "80vw",
        "90vw": "90vw",
        "100vw": "100vw",
      },      
      colors: {
        blue: {
          50: '#D1D8E7', 
          100: '#A3B0CF', 
          200: '#7489B7', 
          300: '#46619F', 
          400: '#183A87', 
          500: '#132E6C', 
          600: '#0E2351', 
          700: '#0A1736', 
          800: '#050C1B', 
          900: '#02060D'
        },
        green: {
          50: '#E6F3DB', 
          100: '#CDE7B7', 
          200: '#B5DA93', 
          300: '#9CCE6F', 
          400: '#83C24B', 
          500: '#699B3C', 
          600: '#4F742D', 
          700: '#344E1E', 
          800: '#1A270F', 
          900: '#0D1307'
        }
      }
    },
  },
  plugins: [
    require('tailwind-scrollbar'),
  ],
}

