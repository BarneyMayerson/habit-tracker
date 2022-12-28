<x-app-layout>
  <div class="flex flex-col bg-gray-200 min-h-screen justify-center">
    <div class="flex flex-col bg-white pt-10 pb-8 sm:max-w-lg sm:min-w-[490px] sm:mx-auto px-6 sm:px-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl">
      <div class="flex items-center justify-between">
        <h1 class="text-xl font-semibold">Habit Tracker</h1>
        <button class="text-white bg-primary-600 rounded-md px-2.5 py-2">New Habit</button>
      </div>

      <div class="divide-y divide-gray-300/5">
        <div class="text-base leading-7 text-gray-900">
          <div class="flex items-center py-2.5">
            <div class="flex basis-1/2 flex-col">
              <h1 class="font-semibold">Drink water</h1>
              <small class="text-gray-400">1 / 3 times</small>
            </div>
            <div class="flex basis-1/4 justify-center p-2.5">
              <button class="bg-primary-600 text-white font-semibold text-2xl rounded-lg px-4 py-2">+1</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>