import { createPinia, setActivePinia } from "pinia";
import { beforeEach, describe, it, expect } from "vitest";
import { useHabitsStore } from "@/stores/habits";

describe("Habits Store", async () => {
  let habits = null;
  let habitIndex = 0;

  beforeEach(async () => {
    setActivePinia(createPinia());
    habits = useHabitsStore();
    await habits.fetch();
    habitIndex = 0;
  });

  it("fetches the list of habits", async () => {
    expect(habits.list.length).toBe(1);
  });

  it("increments the executions", async () => {
    habits.list[habitIndex].executions_count = 0;

    habits.newExecution(habitIndex);

    expect(habits.list[habitIndex].executions_count).toBe(1);
  });

  it("returns the percent", async () => {
    habits.list[habitIndex].times_per_day = 3;
    habits.list[habitIndex].executions_count = 1;

    expect(habits.percent(habitIndex)).toBe(33);
  });
});
