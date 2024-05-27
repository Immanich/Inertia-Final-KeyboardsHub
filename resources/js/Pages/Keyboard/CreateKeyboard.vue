<script setup>
// import { Head, Link, ref } from 'vue';

import { Head, Link, useForm } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';

const form = useForm({
    image: null,
    brand: '',
    model: '',
    type: '',
    color: '',
    price: 0,
})

const submit = () => {
    form.post("/create-keyboards", {
        onSuccess: () => {
            window.location.href = route('index');
        }
    });
}
</script>
<template>

    <Head title="Create Keyboard" />
    <div class="container px-32 py-8 flex justify-center h-fit min-h-screen max-h-full">
        <div id="wrapper" class="wrapper p-8 h-max">
            <h2 class="mb-4 text-2xl font-extralight tracking-widest" style="opacity: 0.7;">CREATE KEYBOARD</h2>
            <form method="post" @submit.prevent="submit" enctype="multipart/form-data">
                <div class="form">
                    <div class="input-row first-row flex justify-between">
                        <label class="image" for="image">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Image</h3>
                            <input class="text-black" style="min-width: 16rem;" type="file" name="image" @change="e => form.image = e.target.files[0]" >
                        </label>
                    </div>
                    <div class=" input-row first-row flex justify-between">
                            <label class="brand" for="brand">
                                <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Brand</h3>
                                <input class="text-black" style="min-width: 16rem;" type="text" name="brand"
                                    v-model="form.brand">
                            </label>
                    </div>
                    <div>
                        <label class="model" for="model">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Model</h3>
                            <input class="text-black" style="min-width: 16rem;" type="text" name="model"
                                v-model="form.model">
                        </label>
                    </div>
                    <div class="input-row second-row flex w-full justify-between">
                        <label class="type" for="type">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Type</h3>
                            <input class="text-black" style="min-width: 16rem;" type="text" name="type"
                                v-model="form.type">
                        </label>
                    </div>
                    <div>
                        <label class="color" for="color">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Color</h3>
                            <input class="text-black" style="min-width: 16rem;" type="text" name="color"
                                v-model="form.color">
                        </label>
                    </div>
                    <div class="input-row price">
                        <label class="price" for="price">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Price</h3>
                            <input class="w-full text-black" type="number" name="price" v-model="form.price">
                        </label>
                    </div>
                    <div class="input-row btns flex justify-between">
                        <button type="submit" id="submit-btn"
                            class="px-3 py-2 tracking-widest text-black">SUBMIT</button>
                        <button style="font-weight: 200; opacity: 0.7;"
                            class="font-extralight tracking-widest opacity">BACK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<style scoped>
@keyframes opening {
    from {
        transform: translateX(-100%);
        opacity: 0.8;
        background-color: black;
    }

    to {
        transform: translateX(0%);
        opacity: 1;
        background-color: black;
    }
}

.container {
    background-color: #060606;
    color: #fff;
    overflow: hidden;
    animation: opening 1s ease-in-out;
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
    /* color */
}

.terms-and-conditions {
    margin-bottom: 2rem;
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