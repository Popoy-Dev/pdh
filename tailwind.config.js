module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    fontFamily: {
     'nunito': ['nunito', 'sans-serif'],
     'MyFont': ['"My Font"', 'serif']
   },
    textColor:{
      'primary':'#228DD5',
      'dark':'#474646',
      'dark-2':'#585858',
      'dark-3':'#3A3C42',
      'white':'#FFFFFF'
    },
    backgroundColor:{
      'primary':'#7ec7ed',
      'secondary':'#228DD5',
      'secondary-2':'#EDF6FC',
      'white-2':'#FFFFFF',
      'warning':'#ffe4b9',
      'warning-2':'#ffbe55'
    },
    screens: {
      'xs': {'min': '320px', 'max':'499px'},
      'xxs': {'min':'375px','max':'425px'},
      's' : {'min':'500px','max':'599px'},
      'sm': {'min': '600px', 'max': '767px'},
      'md': {'min': '768px', 'max': '823px'},
      'to-md':{'min':'824px','max':'1023px'},
      'lg': {'min': '1024px', 'max': '1139px'},
      'to-lg': {'min': '1140px', 'max': '1279px'},
      'xl': {'min': '1280px','max':'1440px'},
      'xxl': {'min': '1441px','max':'1920px'}
    },

  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
