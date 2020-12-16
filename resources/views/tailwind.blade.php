https://www.youtube.com/watch?v=bxmDnn7lrnk&t=465s
node.js //eta cp a install korte hobe
<!-- for project -->
npm init -y
https://tailwindcss.com/docs/installation
npm install tailwindcss
<!-- showing detault class -->
npx tailwindcss init --full
<!-- showing custom class -->
npx tailwindcss init
<!-- custom tailwind.config.js -->
module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors:{
        primary: "#fff",
        secondary: {
          100: '#000',
          200: '#345678',
        }
      },
      fontFamily:{
        langar:['Langar']
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}

<!-- folder -->
public and src/style.css nije banao
<!-- to styles.css -->
@tailwind base;
@tailwind components;
@tailwind utilities;
<!-- package.json -->
"scripts": {
	"build-css":"tailwindcss build src/styles.css -o public/styles.css"
},
npm run build-css

<!-- live server install -->
npm install live-serve -g
<!-- start server -->
live-server public //kaj kore na

https://tailwindcss.com/docs/font-size
https://tailwindcss.com/docs/customizing-colors#disabling-a-default-color
https://tailwindcss.com/docs/padding
https://tailwindcss.com/docs/border-width
https://tailwindcss.com/docs/breakpoints

<!-- font-family -->
css class a import koro.tailwind.config.js a add koro.then "npm run build-css"
/////text diye size and font diye family
font-serif/mono/sans

text-gray-700 up to 900
font-bold
font-light
text-sm/xl/2xl
uppercase
font-semibold/bold
p-0,.5 up tp 96
m-auto
-m-0.5
<!-- border -->
border-opacity-0
border-opacity-5
border-opacity-10 up to 100
 
border-0
border-2 up to 8
border-t-0
border-b-2 border-gray-200

flex justify-center/start/end/between/around or evenly //eta width er sathe 
flex items-end/cneter //eta height er sathe center kore
="bg-gray-500 sm:bg-green-700 md:bg-red-500 lg:bg-blue-500(1280px)


rounded
rounded-t-sm/md/lg/full/none
overflow-hidden
shadow-md
shadow-inner
block
<!-- for image -->
w-full,object-cover

grid grid-cols-3
col-span-2  //like col-md-8
col-span-1  //like col-md-4

tracking-wider //letter spaching

transition ease-out/linear/in/in-out duration-500
a