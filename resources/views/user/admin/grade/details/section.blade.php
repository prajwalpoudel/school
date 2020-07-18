<x-basic.accordion.accordion-detail id='section-id' href='section-href' title="Section Details" parent-id="gradeaccordion">
    <x-slot name="content">
       <x-tables.table
           :theads="['Id', 'Name', 'Display Name', 'Class Teacher', 'Number of Students']"
           :tbody="['key', 'name', 'display_name', 'ABCD', 'student_count']"
           :datas="$sections"
       ></x-tables.table>
    </x-slot>
</x-basic.accordion.accordion-detail>
