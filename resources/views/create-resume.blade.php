@include('common/header')

<section class="bg-gray-50 dark:bg-gray-800 pt-10">
    <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
        @include('common.resumes-carousel')
    </div>
</section>
<div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
    <div class="max-w-screen-md mx-auto">
        <livewire:create-resume/>
    </div>
</div>

@include('common/footer')