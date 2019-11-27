<template>
  <div class="inset-0 mt-0 w-full h-full absolute wrapper">
    <div class="bg-cover bg-center absolute z-10 h-screen bg-no-repeat -mt-8"></div>
    <div
      class="z-0 opacity-90 w-full h-full absolute"
      style="background: linear-gradient(-45deg, #2f1ce0 0%, #C2AAFE 50%, #4931A5 100%);"
    ></div>
    <div class="absolute w-full flex flex-col">
      <div
        class="bg-bottom bg-no-repeat bg-cover flex md:block justify-between flex-row-reverse"
        style="background-image:url('/icons/bg-curve.svg')"
      >
        <header class="z-20 w-1/3 md:w-full  md:px-6">
          <a href="https://awssat.com" alt="awssat"><img src="/icons/logo.png" class="w-16 h-16 md:w-12 md:h-12 float-right mr-6 mt-3 bg-white rounded-full" /></a>
        </header>
        <section class="w-2/3 md:w-full">
          <div class="container md:mx-auto flex flex-row items-center xl:pb-16 xl:px-0 px-4">
            <div class="w-full md:w-1/2 text-white md:flex flex-col mb-12">
              <h1
                class="text-2xl md:text-4xl py-4 md:py-12 head-font"
              >App &amp; Web Development with Passion</h1>
            </div>
            <div class="md:w-2/4 xl:pt-6 flex justify-end items-end">
              <img
                alt="awssat"
                src="/icons/pl0.svg"
                class="hidden z-1 md:block relative -mt-16 -mb-12 -mr-32 h-64 self-end"
              />
            </div>
          </div>
        </section>
      </div>
      <div
        class="pb-8 w-full pt-8 -mt-1 bg-white md:bg-repeat bg-center bg-cover"
        style="background-image:url('/icons/bg.svg')"
      >
        <div class="container mx-auto">
          <!-- 1st part -->
          <div class="text-center w-full pb-16 md:mb-32">
            <h3 class="uppercase text-gray-700 head-font">We convert your ideas to reality</h3>
            <p
              class="text-3xl md:text-4xl text-black-800 pt-4 xl:w-1/2 mx-auto head-font"
            >Because Code Isn’t Just Functional, It’s Poetic!</p>
          </div>

          <!-- 2nd part -->
          <div class="md:mt-32 h-full md:mx-12 flex flex-col flex-col-reverse md:block overflow-hidden md:overflow-visible">
            <div
              class="p-2 md:px-8 md:py-10 md:rounded-lg border border-gray-200 md:shadow-lg bg-white md:flex flex-col overflow-hidden"
            >
              <h2 class="text-center md:text-right font-black text-2xl border-0 head-font">Web Development</h2>
              <p class="leading-loose text-xl text-justify z-10 md:h-56 reading-font px-3 md:px-0 md:w-2/3">
                 Each project is different to us, we adapt to your business model. From complete e-commerce solutions to
                <span
                  class="bg-purple-800 text-white px-1"
                >personalized web applications and websites</span>, our development team always succeeds in successfully implementing a well crafted responsive design
                <span class="bg-purple-800 text-white px-1">with a clean and optimized code</span>
              </p>
            </div>
            <div class="relative -mb-24 md:mb-0 opacity-25 md:opacity-100 md:-mt-64 -mr-32 flex justify-end overflow-hidden">
              <img alt="web development" src="/icons/pl1.svg" style="width:450px" />
            </div>
          </div>

          <!-- 3rd part -->
          <div class="md:flex w-full mt-16">
            <div
              class="md:w-1/3 md:flex text-center md:justify-end p-5 h-full text-2xl self-center head-font font-bold"
            >Technologies We Use</div>
            <div class="w-1/3 p-5 hidden md:block">
              <img
                alt="web development"
                src="/icons/arrows.svg"
                class="mt-2 z-1 opacity-25 h-64 self-center"
              />
            </div>
            <div class="w-full md:w-1/3 flex justify-between md:flex-col p-4 md:p-0 md:ml-12">
              <div class="md:mb-2">
                <img src="/icons/laravel.svg" width="80" height="80" />
                <span
                  class="relative block bg-gray-900 text-sm text-gray-100 -mt-2 -mr-3 w-20 text-center"
                >Laravel</span>
              </div>
              <div class="md:my-8">
                <img src="/icons/vue.svg" width="80" height="80" />
                <span
                  class="relative block bg-gray-900 text-sm text-gray-100 -mt-2 -mr-3 w-20 text-center"
                >Vue.js</span>
              </div>
              <div class="mt-3 md:mt-0">
                <img src="/icons/tailwindcss.svg" width="90" height="90" />
                <span
                  class="relative block bg-gray-900 text-sm text-gray-100 -mt-10 -mr-3 w-24 text-center"
                >TailwindCSS</span>
              </div>
            </div>
          </div>
  
          <!-- 4th part -->
          <div class="mb-32 mt-8 md:mt-32 h-full md:mx-12 flex flex-col flex-col-reverse md:block">
            <div
              class="p-2 md:px-8 md:py-10 md:rounded-lg border border-gray-200 md:shadow-lg bg-white md:flex flex-col overflow-hidden"
            >
              <h2 class="text-center md:text-left font-black text-2xl border-0 head-font">Mobile Apps Development</h2>
              <p class="leading-loose text-xl text-justify z-10 md:h-56 reading-font md:w-2/3 self-end p-3 md:p-0">
                We develop mobile applications dedicated to smart devices, smartphones and tablets.
                <span
                  class="bg-purple-800 text-white px-1"
                >Our mobile apps are compatible with IOS or Android</span>
 and are created using React Native, NativeScript, or Flutter frameworks.
              </p>
            </div>
            <div class="relative -mb-24 md:mb-0 opacity-25 md:opacity-100 md:-mt-64 -ml-32 flex justify-start">
              <img alt="apps development" src="/icons/pl2.svg" style="width:450px" />
            </div>
          </div>

          <!-- 5th part -->
        <div class="flex items-center bg-purple-600 text-white text-sm font-bold mx-3 md:mx-12 px-4 py-3" role="alert">
          <svg class="fill-current w-12 h-12 md:w-6 md:h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.5 2C6.81 2 3 5.81 3 10.5S6.81 19 11.5 19h.5v3c4.86-2.34 8-7 8-11.5C20 5.81 16.19 2 11.5 2zm1 14.5h-2v-2h2v2zm0-3.5h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2h-2c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
          <p class="text-xl reading-font">Let's figure out how we could step in and help you out. <a href="mailto:hello@awssat.com?subject=Hire%20a%20team&amp;body=Tell%20us%20as%20much%20as%20you%20can%20about%0A-%20where%20you%20are%20stuck%0A-%20the%20current%20state%20and%20planning%20of%20the%20project%0A-%20your%20budget%0A-%20%E2%80%A6%0A%0AAnything%20that%20helps%20us%20to%20start%20straightforward%21" class="underline font-bold text-white">Click here</a> to contact us.</p>
        </div>

        </div>
      </div>
      <footer class="text-center mt-12 pb-8 border-t border-gray-200 pt-8 text-lg text-gray-500 bg-white">Awssat &copy;</footer>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Comfortaa|Maven+Pro&display=swap");
@import "https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css";
.wrapper {
  margin-top: 0 !important;
}
.head-font {
  font-family: "Comfortaa", cursive;
}
.reading-font {
  font-family: "Maven Pro", sans-serif;
}
</style>