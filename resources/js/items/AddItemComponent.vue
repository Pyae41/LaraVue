<template>
  <LayoutComponent>
    <h3 class="text-2xl p-3">Add Item</h3>

    <router-link
      to="/item"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
    >Back</router-link>

    <div class="max-w-auto mt-5 mx-auto h-54 p-6 bg-white border border-gray-200 rounded-lg shadow">
      <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="grid gap-6 mb-2 md:grid-cols-2">
          <h5 class="font-bold">Item Information</h5>
          <h5 class="font-bold">Owner Information</h5>
          <div>
            <label
              for="first_name"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Item name</label>
            <input
              type="text"
              id="first_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Book,etc....."
              required
              :value="item.item_name"
              @input="item.item_name = $event.target.value"
            />
          </div>
          <div>
            <label
              for="last_name"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Owner Name</label>
            <input
              type="text"
              id="last_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Mg Mg,etc...."
              required
              :value="item.owner_name"
              @input="item.owner_name = $event.target.value"
            />
          </div>
          <div>
            <label
              for="company"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Select Category</label>
            <select
              @change="item.category_id = $event.target.value"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
              <option value selected hidden>Select Category</option>
              <option
                v-for="(category, index) in categories"
                :value="category.id"
                :key="index"
              >{{ category.name }}</option>
            </select>
          </div>
          <div>
            <label
              for="phone"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Phone number</label>
            <input
              type="tel"
              id="phone"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="+959xxxxxxxx"
              pattern="[0-9+]{3}[0-9]{10}"
              required
              :value="item.contact_number"
              @input="item.contact_number = $event.target.value"
            />
          </div>
          <div>
            <label
              for="website"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Price</label>
            <input
              type="text"
              id="website"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Enter price"
              required
              :value="item.price"
              @input="item.price = $event.target.value"
            />
          </div>
          <div>
            <label
              for="visitors"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Address</label>
            <textarea
              id="description"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="Enter address"
              required
              :value="item.address"
              @input="item.address = $event.target.value"
            ></textarea>
          </div>

          <div class="mb-6">
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Description</label>

            <textarea
              name="description"
              id="editor"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              :value="item.descripton"
              @input="item.description = CKEditor.instances.description.getData()"
            ></textarea>
          </div>

          <div class="mb-6 row-span-5">
            <!-- <GoogleMap
              api-key="AIzaSyCgJNK9I5_QrfW45rFNkOE1SEzA8cjMs3w"
              style="width: 100%; height: 400px"
              :center="center"
              :zoom="15"
            >
              <Marker :options="{ position: center }" />
            </GoogleMap>-->
            <!-- <location-picker v-model="location" :options="options"></location-picker> -->
            <l-map
              ref="map"
              :zoom="30"
              :center="center"
              :useGlobalLeaflet="false"
              style="width: 600px;height:500px;"
            >
              <l-tile-layer
                url="http://{s}.tile.osm.org/{z}/{x}/{y}.png"
                layer-type="base"
                name="OpenStreetMap"
              ></l-tile-layer>
              <l-marker :lat-lng="center" :draggable="true" @drag="updateCoordinates"></l-marker>
            </l-map>
          </div>

          <div class="mb-6 space-y-6">
            <div>
              <label
                for="confirm_password"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Item Condition</label>
              <select
                @change="item.item_condition = $event.target.value"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              >
                <option value selected hidden>Select Item Condition</option>
                <option value="New">New</option>
                <option value="Used">Used</option>
                <option value="Good Second Hand">Good Second Hand</option>
              </select>
            </div>

            <div>
              <label
                for="confirm_password"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Item Type</label>
              <select
                @change="item.item_type = $event.target.value"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              >
                <option value selected hidden>Select Item Condition</option>
                <option value="For Sell">For Sell</option>
                <option value="For Buy">For Buy</option>
                <option value="For Exchange">For Exchange</option>
              </select>
            </div>

            <div class="flex items-start mb-6">
              <div class="flex items-center h-5">
                <input
                  id="remember"
                  type="checkbox"
                  @click="checked"
                  class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                />
              </div>
              <label
                for="remember"
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Publish</label>
            </div>

            <div class="flex items-center justify-center w-full">
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
                    v-if="this.item.item_photo ==''"
                    class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                  >
                    <span class="font-semibold">Click to upload</span> or drag and drop
                  </p>
                  <p
                    class="text-md text-gray-500 dark:text-gray-400"
                    v-if="item.item_photo != ''"
                  >{{ this.item.item_photo.name }}</p>
                  <p
                    class="text-xs text-gray-500 dark:text-gray-400"
                    v-else
                  >SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" />
              </label>
            </div>
          </div>
        </div>

        <button
          type="submit"
          class="text-white bg-green-700 hover:bg-blue-80 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center"
        >Create</button>
      </form>
    </div>
  </LayoutComponent>
</template>

<script>
import LayoutComponent from "../components/layouts/LayoutComponent.vue";
import ApiCalls from "../api/ApiCalls";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
import router from "../routes/router";

export default {
  name: "AddItemComponent",
  data() {
    return {
      categories: [],
      item: {
        item_name: "",
        category_id: "",
        price: "",
        description: "",
        address: "",
        item_condition: "",
        item_type: "",
        item_photo: "",
        owner_name: "",
        location: "",
        contact_number: "",
        status: "Unpublish"
      },
      center: {
        lat: 16.8409,
        lng: 96.1735
      }
    };
  },
  components: {
    LayoutComponent,
    ClassicEditor,
    LMap,
    LTileLayer,
    LMarker
  },
  mounted() {
    this.getCategories();

    this.item.location = `${this.center.lat},${this.center.lng}`;

    console.log(this.item.location);

    ClassicEditor.create(document.querySelector("#editor"), {
      placeholder: "Enter Description",
      toolbar: [
        "bold",
        "italic",
        "bulletedList",
        "numberedList",
        "outdent",
        "indent"
      ]
    })
      .then(newEditor => {
        window.editor = newEditor;
      })
      .catch(error => {
        console.error(error);
      });
  },
  methods: {
    async getCategories() {
      const data = await ApiCalls.get("category");
      this.categories = data.categories.data.filter(
        data => data.status == "Publish"
      );
    },
    checked() {
      this.check = this.check ? false : true;
      this.item.status = this.check ? "Publish" : "Unpublish";
      // console.log(this.storeData.status);
    },
    updateCoordinates(e) {
      this.center.lat = e.target.getLatLng().lat;
      this.center.lng = e.target.getLatLng().lng;

      this.item.location = `${this.center.lat},${this.center.lng}`;

      console.log(this.center.lat);
    },
    onFileChange(e) {
      this.item.item_photo = e.target.files[0];
    },
    submit() {
      this.item.description = window.editor.getData();

      let formData = new FormData();
      formData.append("item_name", this.item.item_name);
      formData.append("price", this.item.price);
      formData.append("description", this.item.description);
      formData.append("category_id", this.item.category_id);
      formData.append("item_type", this.item.item_type);
      formData.append("item_condition", this.item.item_condition);
      formData.append("location", this.item.location);
      formData.append("owner_name", this.item.owner_name);
      formData.append("contact_number", this.item.contact_number);
      formData.append("address", this.item.address);
      formData.append("item_photo", this.item.item_photo);
      formData.append("status", this.item.status);
      console.log(formData);
      ApiCalls.post("item", formData);

      router.push("/item");
    }
  }
};
</script>

<style>
</style>
