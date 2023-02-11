<div class="sm:w-full md:w-3/4 lg:w-1/2 h-fit bg-yellow-400">
    <p class="font-semibold text-2xl">Giới thiệu & Nhận thưởng </p>
    <p class="text-xl">Chia sẻ link này cho những người thân quen của bạn để nhận phần thưởng của chúng tôi</p>
    <div class="flex-row flex gap-4">
        <textarea id="register-link" class="resize-none overflow-hidden sm:h-10 h-20 grow row-cols-1 rounded-xl"
                  readonly>{{route('register')."?refcodesource=".$user->refcodesource}}</textarea>
            <button id="copy-button" onclick="onCopyClick()" class="rounded-xl bg-green-600 px-5 h-10 min-w-[7rem]">Copy</button>

        </div>
    </div>
    <!-- Messages for the copied -->
    <script>
        const onCopyClick = () => {
            const copyText = document.getElementById("register-link");
            copyText.select()
            navigator.clipboard.writeText(copyText.value)
            const button = document.getElementById("copy-button");
            button.innerHTML = "Đã Copy!"
        }
    </script>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    {{--    {{route('register', ['refcodesource' => $user->refcodesource])}}--}}
</div>
