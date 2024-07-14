@switch($element['type'])
    @case('textarea')
        <x-textarea
            :id="$element['id']"
            :name="$element['name']"
            :placeholder="$element['placeholder'] ?? '...'"
            :required="$element['required'] ?? ''"
            :rows="$element['rows'] ?? 3"
            :value="$element['value'] ?? ''"
        />
        @break
    @case('select')
        <x-select
            :id="$element['id']"
            :name="$element['name']"
            :placeholder="$element['placeholder'] ?? '...'"
            :options="$element['options'] ?? []"
            :required="$element['required'] ?? ''"
            :value="$element['value'] ?? ''"
        />
        @break
    @case('file')
        <x-input-filepond
            :id="$element['id']"
            :name="$element['name']"
            :required="$element['required'] ?? ''"
        />
        @break
    @default
        <x-input
            :id="$element['id']"
            :name="$element['name']"
            :type="$element['type'] ?? 'text'"
            :placeholder="$element['placeholder'] ?? '...'"
            :required="$element['required'] ?? ''"
            :value="$element['value'] ?? ''"
        />
@endswitch
