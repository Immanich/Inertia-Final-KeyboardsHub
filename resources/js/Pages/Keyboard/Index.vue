<script setup>
import { Head, Link } from '@inertiajs/vue3'
import Navbar from '@/Layouts/Navbar.vue'
import { defineProps } from 'vue';

import { ref, computed } from 'vue';

const isCreateKeyboardVisible = ref(false);

const toggleCreateKeyboard = () => {
    isCreateKeyboardVisible.value = !isCreateKeyboardVisible.value;
};

const iconClass = computed(() => {
    return isCreateKeyboardVisible.value ? 'fa-solid fa-bars text-3xl opacity-40 duration-500' : 'fa-solid fa-bars text-3xl duration-500';
    // <i class="fa-thin fa-bars"></i>
});

const props = defineProps({
    edit_keyboard: Object,
    stage_keyboards: Array,
    expandable_synthesizers: Array,
    performance_synthesizers: Array,
    workstation_synthesizers: Array,
    added_keyboards: Array,
});

const addedKeyboards = ref(props.added_keyboards);
const stageKeyboards = ref(props.stage_keyboards);
const expandableSynthesizers = ref(props.expandable_synthesizers);
const performanceSynthesizers = ref(props.performance_synthesizers);
const workstationSynthesizers = ref(props.workstation_synthesizers);

console.log(addedKeyboards.value);
console.log(stageKeyboards.value);
console.log(expandableSynthesizers.value);
console.log(performanceSynthesizers.value);
console.log(workstationSynthesizers.value);

</script>

<template>
    <Navbar>

        <Head title="Home" />
        <div class="main-container">
            <div class="container closing h-full min-h-screen w-full">
                <div class="wrapper h-full min-h-screen p-8 text-white">
                    <div class="keyboards-category block h-max">
                        <div class="heading w-full flex items-center">
                            <h1 id="header" class="text-5xl font-bold mb-4 flex-1">KEYBOARD</h1>
                            <button href="#" class="w-32" @click.prevent="toggleCreateKeyboard">
                                <!-- <i class="fa-solid fa-bars text-3xl"></i> -->
                                <i :class="iconClass"></i>
                            </button>
                            <div v-if="isCreateKeyboardVisible" class="create-keyboard-popup absolute p-0">
                                <div class="py-4 px-4 hover:bg-stone-200 hover:text-black duration-500 cursor-pointer">
                                    <Link :href="route('createKeyboard')">Create Keyboard</Link>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="added-keyboards-category mb-32" v-if="addedKeyboards.length">
                        <h1 id="header" class="text-5xl font-bold mb-4">ADDED KEYBOARDS</h1>
                        <div class="sub ml-8">
                            <h1 id="subheader" class="mb-4 text-2xl">Click to view specifications</h1>
                            <div
                                class="w-full grid grid-cols-3 gap-10 justify-evenly justify-items-center content-center">
                                <div class="category-list" v-for="ak in added_keyboards" :key="ak.id">
                                    <a :href="route('specs', { model: ak.model })"
                                        class="w-80 text-center opacity-40 hover:opacity-100 duration-500">
                                        <img class="mb-4" style="width: auto; height: 20rem;"
                                            :src="`/storage/${ak.image}`" :alt="`${ak.brand} ${ak.model}`">
                                        <div class="details">
                                            <h1 class="text-2xl">{{ ak.brand }} {{ ak.model }}</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <h1 id="header" class="text-5xl font-bold mb-4">ADDED KEYBOARDS</h1>
                        <div class="sub ml-8">
                            <h1 id="subheader" class="mb-4 text-2xl">No keyboards added recently.</h1>
                        </div>
                    </div> -->
                        <div class="sub ml-8" v-if="stageKeyboards.length">
                            <h1 id="subheader" class="mb-4 text-2xl">Stage Keyboard</h1>
                            <div class="w-full grid grid-cols-3">
                                <div class="category-list " v-for="sk in stage_keyboards" :key="sk.id">
                                    <a :href="route('specs', { model: sk.model }) "
                                        class="w-full  text-center opacity-40 hover:opacity-100 duration-500">
                                        <img class="mb-4" style="width: auto; height: 100%;" :src="sk.image"
                                            :alt="`${sk.brand} ${sk.model}`">
                                        <!-- <img class="mb-4" style="width: auto; height: 20rem;" :src="`/storage/${ak.image}`"
                                        :alt="`${ak.brand} ${ak.model}`"> -->
                                        <div class="details">
                                            <h1 class="text-2xl">{{ sk.brand }} {{ sk.model }}</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <h1 id="header" class="text-5xl font-bold mb-4">STAGE KEYBOARDS</h1>
                            <div class="sub ml-8">
                                <h1 id="subheader" class="mb-4 text-2xl">No keyboards added recently.</h1>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="synthesizers-category" v-if="expandableSynthesizers.length">
                        <h1 id="header" class="text-5xl font-bold mb-4">SYNTHESIZER</h1>
                        <div class="sub ml-8">
                            <h1 id="subheader" class="mb-4 text-2xl">Expandable Synthesizer</h1>
                            <div class="w-full grid grid-cols-3 justify-evenly justify-items-center content-center">
                                <div class="category-list" v-for="es in expandable_synthesizers" :key="es.id">
                                    <a :href="route('specs', { model: es.model }) "
                                        class="w-80 text-center opacity-40 hover:opacity-100 duration-500">
                                        <img class="mb-4" style="width: auto; height: 100%;" :src="es.image"
                                            :alt="`${es.brand} ${es.model}`">
                                        <div class="details">
                                            <h1 class="text-2xl">{{ es.brand }} {{ es.model }}</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="sub ml-8" v-if="workstationSynthesizers.length">
                            <h1 id="subheader" class="mb-4 text-2xl">Workstation Synthesizer</h1>
                            <div class="w-full grid grid-cols-3 justify-evenly justify-items-center content-center">
                                <div class="category-list" v-for="ws in workstation_synthesizers" :key="ws.id">
                                    <a :href="route('specs', { model: ws.model }) "
                                        class="w-80 text-center opacity-40 hover:opacity-100 duration-500">
                                        <img class="mb-4" style="width: auto; height: 100%;" :src="ws.image"
                                            :alt="`${ws.brand} ${ws.model}`">
                                        <div class="details">
                                            <h1 class="text-2xl">{{ ws.brand }} {{ ws.model }}</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="sub ml-8" v-if="performanceSynthesizers.length">
                            <h1 id="subheader" class="mb-4 text-2xl">Performance Synthesizer</h1>
                            <div class="w-full grid grid-cols-3 justify-evenly justify-items-center content-center">
                                <div class="category-list" v-for="ps in performance_synthesizers" :key="ps.id">
                                    <a :href="route('specs', { model: ps.model }) "
                                        class="w-80 text-center opacity-40 hover:opacity-100 duration-500">
                                        <img class="mb-4" style="width: auto; height: 100%;" :src="ps.image"
                                            :alt="`${ps.brand} ${ps.model}`">
                                        <div class="details">
                                            <h1 class="text-2xl">{{ ps.brand }} {{ ps.model }}</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- <div class="added-keyboards-category mb-32" v-if="addedKeyboards.length"> -->
                    <div class="added-keyboards-category mb-32" v-if="addedKeyboards.length">
                        <h1 id="header" class="text-5xl font-bold mb-4">ADDED KEYBOARDS</h1>
                        <div class="sub ml-8">
                            <h1 id="subheader" class="mb-4 text-2xl">Click to view specifications</h1>
                            <div
                                class="w-full grid grid-cols-3 gap-10 justify-evenly justify-items-center content-center">
                                <div class="category-list" v-for="ak in added_keyboards" :key="ak.id">
                                    <a :href="route('specs', { model: ak.model })"
                                        class="w-80 text-center opacity-40 hover:opacity-100 duration-500">
                                        <img class="mb-4" style="width: auto; height: 20rem;"
                                            :src="`/storage/${ak.image}`" :alt="`${ak.brand} ${ak.model}`">
                                        <div class="details">
                                            <h1 class="text-2xl">{{ ak.brand }} {{ ak.model }}</h1>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <h1 id="header" class="text-5xl font-bold mb-4">ADDED KEYBOARDS</h1>
                        <div class="sub ml-8">
                            <h1 id="subheader" class="mb-4 text-2xl">No keyboards added recently.</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Navbar>
</template>
<style scoped>
@font-face {
    font-family: 'Inter';
    src: url('../fonts/Inter-ExtraLight.ttf') format('ttf');
    font-weight: 200;
    font-style: normal;
}

@font-face {
    font-family: 'Inter';
    src: url('../fonts/Inter-Bold.ttf') format('ttf');
    font-weight: bold;
    font-style: normal;
}

.container {
    background-color: #060606;
    overflow: hidden;
    height: auto;
    min-height: fit-content;
    /* animation: opening 1s ease-in-out; */
}
h1, button, Link, img {
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

#title {
    letter-spacing: 0.2ch;
    font-weight: 900;
    animation: opening 1s ease-in-out;
}

.create-keyboard-popup {
    background-color: #333;
    margin-top: 0.5rem;
    width: 12rem;
    z-index: 1;
    top: 10rem;
    text-align: center;
    left: 81.95%;
    right: 0;
    animation: opening 1s ease-in-out;
}
</style>