import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler";
import HabitInfo from "./components/HabitInfo.vue";
import ExecuteButton from "./components/ExecuteButton.vue";
import ProgressBar from "./components/ProgressBar.vue";

createApp({
  components: {
    "habit-info": HabitInfo,
    "execute-button": ExecuteButton,
    "progress-bar": ProgressBar,
  },
}).mount("#app");
