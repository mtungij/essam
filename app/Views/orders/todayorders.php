<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>



<div class="relative flex justify-end">
<a href="/todayreport" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter">
            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
        </svg>
        Download
        </a>
</div>


<div class="relative   sm:rounded-lg">
    <table class="w-full text-sm   text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Customer name
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Order Type
                </th>
                <th scope="col" class="px-6 py-3">
                    work Budget
                </th>

                <th>
                    Employee
                </th>
                <th>
                   Action Date
                </th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $value):?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     <?= $value->customer ?>
                </th>
            <td class="px-6 py-4">
                <?= $value->phone ?>
            </td>
            <td class="px-6 py-4">
                <?= $value->order_type ?>
            </td>
            <td class="px-6 py-4">
                <?= number_format($value->budget) ?>
            </td>
            <td class="px-6 py-4">
            <?= $value->username ?>
            </td>
            <td class="px-6 py-4">
                 <?= $value->created_at ?>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ;?>