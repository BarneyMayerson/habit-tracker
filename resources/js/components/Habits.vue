<template>
  <div class="divide-y divide-gray-300/10 mt-6">
    <div
      v-for="(habit, index) in habits.list"
      :key="habit.id"
      class="text-base leading-7 text-gray-900"
    >
      <div class="flex items-center py-2.5">
        <habit-info
          :name="habit.name"
          :times_per_day="habit.times_per_day"
          :executions_count="habit.executions_count"
        />
        <execute-button @newExecution="habits.newExecution(index)" />
        <progress-bar :percent="habits.percent(index)" />
      </div>
    </div>
  </div>
</template>

<script setup>
import HabitInfo from "@/components/HabitInfo.vue";
import ExecuteButton from "@/components/ExecuteButton.vue";
import ProgressBar from "@/components/ProgressBar.vue";
import { useHabitsStore } from "@/stores/habits";

const habits = useHabitsStore();

const fetchHabits = async () => {
  await habits.fetch();
};

fetchHabits();
</script>
