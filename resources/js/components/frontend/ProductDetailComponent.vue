<template>
  <div>
    <div class="container w-full bg-gray-300" style="height: 400px;">
      <img :src="`/storage/${product.item_photo}`" alt class="h-full w-1/3 mx-auto" />
    </div>
    <div class="container p-3 w-full h-screen">
      <div class="grid xl:grid-cols-2">
        <div class="space-y-10">
          <h1 class="text-2xl font-bold">{{ product.item_name }}</h1>
          <span class="text-blue-400">$ {{ product.price }}</span>

          <div class="grid sm:grid-cols-2 lg:grid-cols-3 w-80">
            <div>
              <h3 class="font-bold">Type</h3>
              <span
                class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
              >{{product.item_type}}</span>
            </div>
            <div>
              <h3 class="font-bold">Condition</h3>
              <span
                class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
              >{{product.item_condition}}</span>
            </div>
            <div>
              <h3 class="font-bold">Status</h3>
              <span
                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"
              >{{ (product.status == 'Publish')? 'Avaliable' : 'Unavaliable' }}</span>
            </div>
          </div>

          <div>
            <h3 class="text-2xl">Hightlighted Information</h3>
            <p
              class="ml-4 text-gray-400"
            >Try a quick search to explore hundreds of affordable options.</p>
          </div>

          <div>
            <h3 class="text-2xl">Product Description</h3>
            <p class v-html="product.description"></p>
          </div>

          <div class="space-y-4">
            <h3 class="text-2xl">Owner Information</h3>

            <div
              class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
            >
              <a href="#" class="flex items-center">
                <svg
                  class="w-5 h-5 mb-2"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  version="1.1"
                  id="Layer_1"
                  x="0px"
                  y="0px"
                  viewBox="0 0 122.88 122.27"
                  style="enable-background:new 0 0 122.88 122.27"
                  xml:space="preserve"
                >
                  <g>
                    <path
                      d="M33.84,50.25c4.13,7.45,8.89,14.6,15.07,21.12c6.2,6.56,13.91,12.53,23.89,17.63c0.74,0.36,1.44,0.36,2.07,0.11 c0.95-0.36,1.92-1.15,2.87-2.1c0.74-0.74,1.66-1.92,2.62-3.21c3.84-5.05,8.59-11.32,15.3-8.18c0.15,0.07,0.26,0.15,0.41,0.21 l22.38,12.87c0.07,0.04,0.15,0.11,0.21,0.15c2.95,2.03,4.17,5.16,4.2,8.71c0,3.61-1.33,7.67-3.28,11.1 c-2.58,4.53-6.38,7.53-10.76,9.51c-4.17,1.92-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.27-1.69 c-6.56-2.03-13.17-5.38-20.39-9.84l-0.53-0.34c-3.31-2.07-6.89-4.28-10.4-6.89C31.12,93.32,18.03,79.31,9.5,63.89 C2.35,50.95-1.55,36.98,0.58,23.67c1.18-7.3,4.31-13.94,9.77-18.32c4.76-3.84,11.17-5.94,19.47-5.2c0.95,0.07,1.8,0.62,2.25,1.44 l14.35,24.26c2.1,2.72,2.36,5.42,1.21,8.12c-0.95,2.21-2.87,4.25-5.49,6.15c-0.77,0.66-1.69,1.33-2.66,2.03 c-3.21,2.33-6.86,5.02-5.61,8.18L33.84,50.25L33.84,50.25L33.84,50.25z"
                    />
                  </g>
                </svg>
                <h5
                  class="ml-5 mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                >Contact Number</h5>
              </a>
              <p
                class="mb-3 font-normal text-gray-500 dark:text-gray-400"
              >{{ product.contact_number }}</p>
            </div>
          </div>

          <div
            class="flex max-w-sm p-3 bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
          >
            <div
              class="rounded-full w-12 h-12 bg-[url('https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1683132709~exp=1683133309~hmac=c5adb7707b2aa45d7441797d420da0692a65ab4e2d630ce36ee635688815cc1e')] bg-cover"
            ></div>
            <div class="ml-4">
              <h3>UserName</h3>
              <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{ product.address }}</p>
            </div>
          </div>
        </div>
        <div>
          <div>
            <div class="flex items-center">
              <svg
                class="w-5 h-5 mr-5"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                fill="#000000"
                version="1.1"
                id="Capa_1"
                width="800px"
                height="800px"
                viewBox="0 0 395.71 395.71"
                xml:space="preserve"
              >
                <g>
                  <path
                    d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738   c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388   C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191   c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z"
                  />
                </g>
              </svg>
              <h3 class="font-bold">Location</h3>
            </div>
            <p class="ml-10">{{ product.address }}</p>
          </div>

          <div class="mb-6 row-span-6 mt-5">
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
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ApiCalls from "../../api/ApiCalls";
import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
import { useRoute } from "vue-router";

export default {
  name: "ProductDetailComponent",
  data() {
    return {
      route: useRoute(),
      product: [],
      center: {
        lat: 16.8409,
        lng: 96.1735
      },
    };
  },
  components: {
    LMap,
    LTileLayer,
    LMarker
  },
  mounted() {
    this.getDetail();
  },
  methods: {
    async getDetail() {
      let data = await ApiCalls.getById(
        `client/product/detail/${this.route.params.id}`
      );

      this.product = data.item;

      this.center = {
        lat : this.product.location.split(',')[0],
        lng : this.product.location.split(',')[1]
      }

      console.log(this.center);
    }
  }
};
</script>

<style>
</style>
