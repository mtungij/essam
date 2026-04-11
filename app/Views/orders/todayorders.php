<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<?php
    $query = http_build_query([
        'branch' => $selectedBranch ?? '',
        'from'   => $from ?? date('Y-m-d'),
        'to'     => $to ?? date('Y-m-d'),
    ]);
?>

<?php if (!empty($isAdmin) && $isAdmin): ?>
<div class="bg-white rounded-lg p-4 mb-4 border border-gray-200">
    <form method="get" action="/orders/todayorders" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 items-end">
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Branch</label>
            <select name="branch" class="w-full border border-gray-300 rounded-lg p-2 text-sm">
                <option value="">All Branches</option>
                <?php foreach (($branches ?? []) as $b): ?>
                    <option value="<?= esc($b->name) ?>" <?= (($selectedBranch ?? '') === $b->name) ? 'selected' : '' ?>>
                        <?= esc($b->name) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">From</label>
            <input type="date" name="from" value="<?= esc($from ?? date('Y-m-d')) ?>" class="w-full border border-gray-300 rounded-lg p-2 text-sm">
        </div>
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">To</label>
            <input type="date" name="to" value="<?= esc($to ?? date('Y-m-d')) ?>" class="w-full border border-gray-300 rounded-lg p-2 text-sm">
        </div>
        <div class="flex flex-col sm:flex-row gap-2 lg:ml-3">
            <button type="submit" class="w-full sm:w-auto text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2">Filter</button>
            <a href="/orders/todayorders" class="w-full sm:w-auto text-center text-gray-700 bg-gray-100 hover:bg-gray-200 font-medium rounded-lg text-sm px-4 py-2">Reset</a>
        </div>
    </form>
</div>
<?php endif; ?>


<div class="relative flex justify-start sm:justify-end mb-4">
<a href="/orders/todayorders/download?<?= $query ?>" target="_blank" class="w-full sm:w-auto text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex justify-center items-center me-0 sm:me-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter">
            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
        </svg>
        Download
        </a>
</div>


<div class="relative sm:rounded-lg overflow-x-auto">
    <table class="w-full text-sm   text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-indigo-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    S/No
                </th>
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
            <?php $rowId = 1; ?>
            <?php foreach($orders as $value):?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 text-black">
                    <?= $rowId++ ?>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     <?= strtoupper($value->customer) ?>
                </th>
            <td class="px-6 py-4 text-black">
                <?= $value->phone ?>
            </td>
            <td class="px-6 py-4 text-black">
                <?= $value->order_type ?>
            </td>
            <td class="px-6 py-4 text-black">
                <?= number_format($value->budget) ?>
            </td>
            <td class="px-6 py-4 text-black">
            <?= $value->username ?>
            </td>
            <td class="px-6 py-4 text-black">
                 <?= $value->created_at ?>
            </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>



<?= $this->endSection() ;?>