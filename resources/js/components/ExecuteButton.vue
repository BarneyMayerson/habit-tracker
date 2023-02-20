<template>
  <div class="flex basis-1/4 justify-center p-2.5">
    <button
      id="execute"
      @click="$emit('newExecution')"
      class="bg-primary-600 text-white font-semibold text-2xl rounded-lg px-4 py-2"
    >
      +1
    </button>
  </div>
</template>

<script setup></script>
