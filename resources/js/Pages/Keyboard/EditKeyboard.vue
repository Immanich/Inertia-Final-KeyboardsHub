<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    specs: Array,
    edits: Object
});

const form = useForm({
    image: null,
    brand: props.edits.brand,
    model: props.edits.model,
    type: props.edits.type,
    color: props.edits.color,
    price: props.edits.price,
});

// const submit = async () => {
//     await form.put(`/keyboards/${props.keyboards.model}`);
// };
const submit = () => {
    form.put(route('update', { model: props.edits.model }), {
        onSuccess: () => {
            alert('Keyboard updated successfully');
            // Redirect to the specs page after successful update
            window.location.href = route('index', { model: props.edits.model });
        },
        onError: (errors) => {
            console.log(errors);
            alert('Failed to update the keyboard. Please check the console for more details.');
        },
    });
};



</script>

<template>

    <Head title="Edit Keyboard" />
    <div class="container px-32 py-8 flex justify-center h-fit min-h-screen max-h-full">
        <div id="wrapper" class="wrapper p-8 h-max">
            <h2 class="mb-4 text-2xl font-extralight tracking-widest" style="opacity: 0.7;">EDIT KEYBOARD</h2>
            <form @submit.prevent="submit">
                <!-- @csrf -->
                <div class="form">
                    <div class="input-row first-row flex justify-between">
                        <label class="image" for="image">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Image</h3>
                            <input class="text-black" type="file" name="image"
                                @change="e => form.image = e.target.files[0]">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="brand" for="brand">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Brand</h3>
                            <input class="text-black w-full" style="width: 100%;" type="text" name="brand"
                                v-model="form.brand">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="model" for="model">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Model</h3>
                            <input class="text-black w-full" type="text" name="model" v-model="form.model">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="type" for="type">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Type</h3>
                            <input class="text-black w-full" type="text" name="type" v-model="form.type">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="color" for="color">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Color</h3>
                            <input class="text-black w-full" type="text" name="color" v-model="form.color">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="price" for="price">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Price</h3>
                            <input class="text-black w-full" type="number" name="price" v-model="form.price">
                        </label>
                    </div>
                    <div class="input-row btns flex justify-between items-center" v-for="spec in specs" :key="spec.id">
                        <button type="submit" id="submit-btn"
                            class="px-3 py-2 tracking-widest text-black">SUBMIT</button>
                        <Link :href="route('specs', { model: spec.model })" style="font-weight: 200; "
                            class="font-extralight tracking-widest opacity-40 hover:opacity-100 duration-500">
                        <span>BACK</span></Link>
                        <!-- <Link :href="route('createKeyboard')">Create Keyboard</Link> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
h1,
button,
Link,
img, span, input, label, h3, h2, .wrapper {
    animation: opening 1s ease-in-out;
}

@keyframes opening {
    from {
        transform: translateX(-100%);
        opacity: 0;
        /* background-color: black; */
    }

    to {
        transform: translateX(0%);
        opacity: 1;
        /* background-color: black; */
    }
}

.container {
    background-color: #060606;
    color: #fff;
    overflow: hidden;
}

#wrapper {
    background-color: #141414;
    border: solid 1px rgba(255, 255, 255, 0.68);
}

.input-row {
    margin-bottom: 1rem;
}

h3 {
    font-weight: 200;
}

input {
    background-color: #ebebeb;
    color: #000;
}

#submit-btn {
    background-color: #5DBEA3;
    transition: 500ms;
}

#submit-btn:hover {
    cursor: pointer;
    background-color: #33B249;
}
</style>
