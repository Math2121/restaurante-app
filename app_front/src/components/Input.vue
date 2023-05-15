<template>
  <div>
    <label class="block text-sm text-gray-800">{{ label }}</label>
    <input
      :value="modelValue"
      :type="type"

      @input="$emit('update:modelValue', $event.target.value)"
      class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:border-emerald-400 focus:ring-emerald-300 focus:outline-none focus:ring focus:ring-opacity-40"
	  required
    />
  </div>
</template>

<script>
export default {
  props: {
	label: {
      type: String,
      required: true,
    },
    modelValue: {
      type: String,
      required: true,
    },
	type: {
      type: String,
      default: "text",
    }
  },
  data(){
	return{

	}
  }
};
</script>
