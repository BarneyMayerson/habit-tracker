import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";

export const useHabitsStore = defineStore("habits", () => {
  const list = ref([]);

  const fetch = async () => {
    try {
      let response = axios.get("api/habits");

      list.value = (await response).data.data;
    } catch (error) {
      console.log(error);
    }
  };

  return {
    list,
    fetch,
  };
});
