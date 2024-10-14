<div class="mb-4">
    <div class="bg-white dark:bg-dark-700 rounded-lg shadow-sm">
        <div class="p-4">
            <h3 class="text-lg font-medium">{{ $pdf->title }}</h3>
            @if($pdf->description)
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ $pdf->description }}
                </p>
            @endif
        </div>
        <div class="border-t border-gray-200 dark:border-dark-600">
            <iframe 
                src="{{ Storage::disk('documentos')->url($pdf->file_path) }}" 
                class="w-full" 
                style="height: 600px;"
                frameborder="0"
            ></iframe>
        </div>
    </div>
</div>