<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form method="post" action="{{ route('campaign.create') }}" enctype="multipart/form-data">
                    @csrf
                    <!--Title Input-->
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Tiêu Đề')"></x-input-label>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                      :value="old('title')" required
                                      autofocus autocomplete="title"></x-text-input>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"></x-input-error>
                    </div>

                    <!--Trash bin-->
                    {{--                        <x-text-input id="info" class="block mt-1 w-full h-52 border-black border content-start" type="textarea" name="info"--}}
                    {{--                                      :value="old('info')" required--}}
                    {{--                                      autofocus autocomplete="info"></x-text-input>--}}

                    <!--Info Input-->
                    <div class="mt-4">
                        <x-input-label for="info" :value="__('Thông Tin')"></x-input-label>
                        <x-text-area id="info" class="block mt-1 w-full h-52 border-black border content-start"
                                     name="info"
                                     :value="old('info')" required
                                     autofocus autocomplete="info"></x-text-area>

                        <x-input-error :messages="$errors->get('info')" class="mt-2"></x-input-error>
                    </div>

                    <!--Criteria Input-->
                    <div class="mt-4">
                        <x-input-label for="criteria" :value="__('Điều Kiện')"></x-input-label>
                        <x-text-area id="criteria" class="block mt-1 w-full h-52 border-black border content-start"
                                     name="criteria"
                                     :value="old('criteria')" required
                                     autofocus autocomplete="criteria"></x-text-area>

                        <x-input-error :messages="$errors->get('criteria')" class="mt-2"></x-input-error>
                    </div>

                    <!--URL Input-->
                    <div class="mt-4">
                        <x-input-label for="url" :value="__('URL')"></x-input-label>
                        <x-text-input id="url" class="block mt-1 w-full" type="text" name="url"
                                      :value="old('url')" required
                                      autofocus autocomplete="url"></x-text-input>
                        <x-input-error :messages="$errors->get('url')" class="mt-2"></x-input-error>
                    </div>

                    <!--Commission-->
                    <div class="mt-4">
                        <x-input-label for="commission" :value="__('Hoa Hồng')"></x-input-label>
                        <x-text-input id="commission" class="block mt-1 w-full" type="text" name="commission"
                                      :value="old('commission')" required
                                      autofocus autocomplete="commission"></x-text-input>
                        <x-input-error :messages="$errors->get('commission')" class="mt-2"></x-input-error>
                    </div>

                    <!--Image Input-->
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Hình Ảnh')"></x-input-label>
                        <input type="file" name="image" id="image" accept="image/*" class="">
                        <x-input-error :messages="$errors->get('image')" class="mt-2"></x-input-error>
                    </div>
                    <div class="mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Gửi') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
