<template>
  <LayoutComponentVue>
    <h3 class="text-2xl p-3">Add Category</h3>

    <router-link
      to="/category"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
    >Back</router-link>

    <form @submit.prevent="store" enctype="multipart/form-data">
      <div class="w-1/2 mx-auto h-54 p-6 bg-white border border-gray-200 rounded-lg shadow mt-5">
        <div class="mb-6">
          <label
            for="email"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Category Name</label>
          <input
            type="text"
            id="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="enter category"
            required
            v-model="storeData.name"
          />
        </div>
        <div class="flex items-start mb-6">
          <div class="flex items-center h-5">
            <input
              id="remember"
              type="checkbox"
              :value="storeData.status"
              @click="checked"
              class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
            />
          </div>
          <label
            for="remember"
            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
          >Publish</label>
        </div>
        <div class="flex items-center justify-center w-full mb-3">
          <label
            for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
          >
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg
                aria-hidden="true"
                class="w-10 h-10 mb-3 text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                />
              </svg>
              <p
                v-if="this.storeData.category_image ==''"
                class="mb-2 text-sm text-gray-500 dark:text-gray-400"
              >
                <span class="font-semibold">Click to upload</span> or drag and drop
              </p>
              <p
                class="text-md text-gray-500 dark:text-gray-400"
                v-if="storeData.category_img != ''"
              >{{ this.storeData.category_img.name }}</p>
              <p
                class="text-xs text-gray-500 dark:text-gray-400"
                v-else
              >SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" />
          </label>
        </div>
        <button
          type="submit"
          class="text-white bg-green-700 hover:bg-blue-80 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center"
        >Create</button>
      </div>
    </form>
  </LayoutComponentVue>
</template>

<script>
import LayoutComponentVue from "./layouts/LayoutComponent.vue";
import ApiCalls from "../api/ApiCalls";
import router from "../routes/router";

export default {
  name: "AddCategoryComponent",
  data() {
    return {
      check: false,
      storeData: {
        name: "",
        status: "Unpublish",
        category_img: ""
      }
    };
  },
  components: {
    LayoutComponentVue
  },
  methods: {
    checked() {
      this.check = this.check ? false : true;
      this.storeData.status = this.check ? "Publish" : "Unpublish";
      // console.log(this.storeData.status);
    },
    onFileChange(e) {
      this.storeData.category_img = e.target.files[0];
    },
    store() {
      var formData = new FormData();

      formData.append("name", this.storeData.name);
      formData.append("status", this.storeData.status);
      formData.append("category_img", this.storeData.category_img);

      ApiCalls.post("category", formData);

      router.push("/category");
    }
  }
};
</script>

<style>
</style>
