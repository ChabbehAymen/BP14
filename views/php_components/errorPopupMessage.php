<?php
function showPopUpMessage(int $type = null): void
{
    $svg = '<div class="rounded-full bg-green-200 p-6">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-500 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                </div>';
    if ($type === 1) {
        $svg = '<div class="flex justify-center">
                <div class="rounded-full bg-red-200 p-6">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-red-500 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
                    </div>
                </div>
            </div>';
    }elseif ($type === 2 ){
        $svg = '<div class="flex justify-center">
                <div class="rounded-full bg-red-200 p-6">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-red-500 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
                    </div>
                </div>
            </div>';
    }
    echo '<div class="absolute w-min items-center justify-center bg-gray-100 purchasing-successful" style="top: 15%; left: 40%">
        <div class="rounded-lg bg-gray-50 px-16 py-14">
            <div class="flex justify-center">
                '.$svg.'
            </div>
            <h3 class="my-4 text-center text-3xl font-semibold text-gray-700">Enjoy Our Events!!!</h3>
            <p class="w-[230px] text-center font-normal text-gray-600">Your order have been taken and is being attended to</p>
            <button class="mx-auto mt-10 block rounded-xl border-4 border-transparent bg-orange-400 px-6 py-3 text-center text-base font-medium text-orange-100 outline-8 hover:outline hover:duration-300 dismiss-btn">Dismiss</button>
        </div>
    </div>
    <script>document.querySelector("body").style.overflow = "hidden";</script>';
}

;
