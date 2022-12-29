import { createPinia, setActivePinia } from "pinia";
import { beforeEach, describe, it, expect } from "vitest";
import { useHabitsStore } from "@/stores/habits";

describe("Habits Store", () => {
  let habits = null;

  beforeEach(() => {
    setActivePinia(createPinia());
    habits = useHabitsStore();
  });

  it("fetches the list of habits", async () => {
    await habits.fetch();

    expect(habits.list.length).toBe(1);
  });
});
