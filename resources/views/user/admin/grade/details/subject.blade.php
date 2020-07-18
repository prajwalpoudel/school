<x-basic.accordion.accordion-detail id='subject-id' href='subject-href' title="Subject Details" parent-id="gradeaccordion">
    <x-slot name="content">
        <x-tables.table
            :theads="['Id', 'Name', 'Author', 'Publication', 'Edition', 'Price']"
            :tbody="['key', 'name', 'author', 'publication', 'edition', 'price']"
            :datas="$subjects"
        ></x-tables.table>
    </x-slot>
</x-basic.accordion.accordion-detail>
