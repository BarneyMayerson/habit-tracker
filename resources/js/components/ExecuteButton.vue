<template>
  <div class="flex basis-1/4 justify-center p-2.5">
    <button
      id="execute"
      class="bg-primary-600 text-white font-semibold text-2xl rounded-lg px-4 py-2"
    >
      +1
    </button>
  </div>
</template>

<script setup>
import { exec } from "child_process";
import { ref } from "vue";

const executions_count = ref(0);

const newExecution = () => {
  executions_count.value++;
};
</script>
