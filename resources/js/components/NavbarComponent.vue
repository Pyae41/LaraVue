<template>
  <div>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4">
        <div class="flex md:order-2">
          <a
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >{{ this.user.name }}</a>
        </div>
      </div>
    </nav>
    <hr>
  </div>
</template>

<script>
export default {
    name: 'NavbarComponent',
    props: ['user'],
};
</script>

<style>
</style>
