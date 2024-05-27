<script setup>
import { defineProps } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { route } from 'ziggy-js';
// import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    specs: {
        type: Array,
        required: true
    }
});

const form = useForm({
    image: props.specs.image,
    brand: props.specs.brand,
    model: props.specs.model,
    type: props.specs.type,
    color: props.specs.color,
    price: props.specs.price,
});

async function deleteKeyboard(spec) {
    const del = confirm("Are you sure you want to delete?");
    if (del) {
        try {
            // Construct the URL for the delete request
            const url = route('destroy', { model: spec.model });
            console.log("Delete URL:", url);

            // Use Inertia to send the delete request
            Inertia.delete(url, {
                onSuccess: () => {
                    console.log("Delete successful, redirecting...");
                    Inertia.visit(route('index'));
                    window.location.href = route('index');
                },
                onError: (error) => {
                    console.error("Failed to delete keyboard:", error);
                    alert("An error occurred while deleting the keyboard. Please try again.");
                }
            });
        } catch (error) {
            console.error("Unexpected error:", error);
            alert("An unexpected error occurred. Please try again.");
        }
    }
}
</script>
<template>

    <Head title="Specifications" />
    <div class="container h-full min-h-screen w-full">
        <div class="wrapper px-32 py-8 h-full min-h-screen text-white w-full">
            <div class="image w-full flex justify-center" v-for="spec in specs" :key="spec.id">
                <img class="mb-4 w-full" style="width: auto; height: 20rem;"
                    :src="`/storage/${spec.image}` || `/storage/app/public/images/${spec.image}`"
                    :alt="`${spec.brand} ${spec.model}`">
                <Link id="editBtn" :href="route('edit', { model: spec.model }) " style=" position: absolute; left: 80%; top:
                    10%; width: 15%"
                    class="text-2xl bg-green-200 hover:bg-green-500 hover:text-white duration-500 px-4 py-2 text-black text-center">
                EDIT
                KEYBOARD</Link>
                <Link id="editBtn" :href="route('index') " style=" position: absolute; left: 80%; top:
                    18%; width: 15%;"
                    class="text-2xl bg-stone-200 hover:bg-stone-500 hover:text-white duration-500 px-4 py-2 text-black text-center">
                BACK</Link>
                <button @click="deleteKeyboard(spec)"
                    class="bg-red-500 hover:bg-red-700 text-white py-3 px-3 mr-2 text-center duration-500" style=" position: absolute; left: 80%; top:
                    26%; width: 15%">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="inline-block w-4 h-4 "
                        fill="white">
                        <path
                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                    </svg>
                </button>
            </div>
            <div class="table w-full">
                <table class="w-2/5 m-auto">
                    <thead>
                        <tr class="bg-gray-700 text-white">
                            <th class="p-2 border border-gray-400">Specifications</th>
                            <th class="p-2 border border-gray-400">Details</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr v-for="spec in specs" :key="spec.id">
                            <th class="p-2 border border-gray-400">BRAND</th>
                            <td class="p-2 border border-gray-400">{{ spec.brand }}</td>
                        </tr>
                        <tr v-for="spec in specs" :key="spec.id">
                            <th class="p-2 border border-gray-400">MODEL</th>
                            <td class="p-2 border border-gray-400">{{ spec.model }}</td>
                        </tr>
                        <tr v-for="spec in specs" :key="spec.id">
                            <th class="p-2 border border-gray-400">TYPE</th>
                            <td class="p-2 border border-gray-400">{{ spec.type }}</td>
                        </tr>
                        <tr v-for="spec in specs" :key="spec.id">
                            <th class="p-2 border border-gray-400">COLOR</th>
                            <td class="p-2 border border-gray-400">{{ spec.color }}</td>
                        </tr>
                        <tr v-for="spec in specs" :key="spec.id">
                            <th class="p-2 border border-gray-400">PRICE</th>
                            <td class="p-2 border border-gray-400">₱{{ spec.price }}</td>
                        </tr>
                        <tr v-for="spec in specs" :key="spec.id">
                            <th class="p-2 border border-gray-400">N/A</th>
                            <td class="p-2 border border-gray-400">ABOVE ARE ALL OF THE <br> SPECIFICATIONS FOR <br>{{
                                spec.brand }} {{ spec.model }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<style scoped>
h1,
button,
Link,
img,
th,
td,
table,
a {
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
    overflow: hidden;
    height: auto;
    min-height: fit-content;
}

.images {
    margin-bottom: 2rem;
}

.table {
    margin-top: 2rem;
}

.image img {
    margin-bottom: 1rem;
}

thead {
    background-color: #333;
    color: white;
}

tbody tr:nth-child(even) {
    background-color: #444;
}

tbody tr:nth-child(odd) {
    background-color: #555;
}

th {
    padding: 1rem;
    width: 30%;
    border: 1px solid rgb(156 163 175);
}

td {
    padding: 1.5rem;
    width: 100%;
    border: 1px solid rgb(156 163 175);
}
</style>
            <!-- <tr class="border border-black border-solid">
                        <td class="p-2 w-2/5">MODEL</td>
                        <td class="p-2 border-black border">{{ $keyboards -> model }}</td>
                    </tr>
                    <tr class="border border-black border-solid">
                        <td class="p-2 w-2/5">TYPE</td>
                        <td class="p-2 border-black border">{{ $keyboards -> type }}</td>
                    </tr>
                    <tr class="border border-black border-solid">
                        <td class="p-2 w-2/5">COLOR</td>
                        <td class="p-2 border-black border">{{ $keyboards -> color }}</td>
                    </tr>
                    <tr class="border border-black border-solid">
                        <td class="p-2 w-2/5">PRICE</td>
                        <td class="p-2 border-black border">₱{{ number_format($keyboards -> price, 2) }}</td>
                    </tr> -->


            <!-- <tr class="border border-black border-solid">
                        <td class="p-2 w-2/5">QRCODE</td>
                        <td class="p-2 border-black border">
                            {!!
                            QrCode::size(300)->encoding('UTF-8')->generate(
                            'Brand: '.$keyboards->brand."\n".
                            'Model: '.$keyboards->model."\n".
                            'Type: '.$keyboards->type."\n".
                            'Color: '.$keyboards->color."\n".
                            'Price: ₱'.number_format($keyboards->price, 2))
                            !!}
                        </td>
                    </tr> -->
            <!-- <div class="category-list ml-8" v-for="ak in added_keyboards" :key="ak.id">
                <h1 id=" subheader" class="mb-4 text-2xl">BRAND{{ ak.brand }}</h1>
                <img class="mb-4" style="width: auto; height: 100%;" :src="ak.image"
                    :alt="`${ak.brand} ${ak.model}`">
                <div class="details">
                    <h1 class="text-2xl">{{ ak.brand }} {{ ak.model }}</h1>
                </div>
            </div>
            <div class="category-list ml-8" v-for="s in specs" :key="s.id">
                <h1 id=" subheader" class="mb-4 text-2xl">BRAND{{ s.brand }}</h1>
                <img class="mb-4" style="width: auto; height: 100%;" :src="s.image"
                    :alt="`${s.brand} ${s.model}`">
                <div class="details">
                    <h1 class="text-2xl">{{ s.brand }} {{ s.model }}</h1>
                </div>
            </div> -->
