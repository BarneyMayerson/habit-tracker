import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler";
import { createPinia } from "pinia";
import Habits from "./components/Habits.vue";

const pinia = createPinia();

createApp({
  components: {
    habits: Habits,
  },
})
  .use(pinia)
  .mount("#app");
