$(document).ready(function () {

    /////////////////////////////////////////////////// Sales Revenue starts here ///////////////////////////////////////////////////

    $('#ManagerSalesRevenueChart').hide();
    $('#BrokerSalesRevenueChart').hide();

    $('#ManagerId').change(function () {

        $('#BranchSalesRevenueChart').hide();
        $('#ManagerSalesRevenueChart').show();
        $('#BrokerSalesRevenueChart').hide();
        GetManagerRevenue($('#ManagerId').val());
    })

    $('#BrokerId').change(function () {

        $('#BranchSalesRevenueChart').hide();
        $('#ManagerSalesRevenueChart').hide();
        $('#BrokerSalesRevenueChart').show();
        GetBrokerRevenue($('#BrokerId').val());
    })


    //get branches sales revenue
    var chart1 = new Highcharts.Chart({
        chart: {
            renderTo: 'BranchSalesRevenueChart',
            defaultSeriesType: 'bar',
            events: {
                load: GetBranchesRevenue
            }
        },
        title: {
            text: 'Firm Branches Revenue ($)'
        },
        xAxis:{
            categories: [],
            title: {
                text: 'Branches'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Revenue in US$'
            },
            labels: {
                overflow: 'justify'
            }
        },
        series: [{
            name: [],
            data: []            
        }]
    });

    function GetBranchesRevenue() {

        $('#BranchSalesRevenueChart').empty();

        $.ajax({
            url: '../Firm/SalesChart',
            success: function (data) {
                $.each(data, function (index) {

                    chart1.series[0].addPoint([data[index].BranchName, data[index].BranchCommision], false);

                });
                chart1.redraw();
            },
            cache: false
        });
    };

    //get manager's Brokers sales revenue
    var mangerRevChart = new Highcharts.Chart({
        chart: {
            renderTo: 'ManagerSalesRevenueChart',
            defaultSeriesType: 'bar'
            //,
            //events: {
            //    load: GetManagerRevenue(managerId)
            //}
        },
        title: {
            text: 'Firm Manager Revenue ($)'
        },
        xAxis: {
            categories: [],
            title: {
                text: 'Brokers'
            }
        },
        yAxis: {
            min: 100,
            title: {
                text: 'Revenue in US$'
            },
            labels: {
                overflow: 'justify'
            }
        },
        series: [{
            name: [],
            data: []
        }]
    });

    function GetManagerRevenue(managerId) {

        $('#ManagerSalesRevenueChart').empty();
        $.ajax({
            data: { managerId: managerId },
            url: '../Firm/ManagerRevenueChart/',
            success: function (data) {
                $.each(data, function (index) {
                    mangerRevChart.series[0].addPoint([data[index].BrokerName, data[index].BrokerCommission], false);
                });
                mangerRevChart.redraw();
            },
            cache: false
        });
    };

    //get broker sales revenue
    var brokerRevChart = new Highcharts.Chart({
        chart: {
            renderTo: 'BrokerSalesRevenueChart',
            defaultSeriesType: 'bar'

        },
        title: {
            text: 'Firm Broker Revenue ($)'
        },
        xAxis: {
            categories: [],
            title: {
                text: 'Broker'
            }
        },
        yAxis: {
            min: 100,
            title: {
                text: 'Revenue in US$'
            },
            labels: {
                overflow: 'justify'
            }
        },
        series: [{
            name: [],
            data: []
        }]
    });

    function GetBrokerRevenue(brokerId) {
        $('#BrokerSalesRevenueChart').empty();
        $.ajax({
            data: { brokerId: brokerId },
            url: '../Firm/BrokerRevenueChart/',
            success: function (data) {
                $.each(data, function (index) {
                    brokerRevChart.series[0].addPoint([data[index].BrokerName, data[index].BrokerCommission], false);
                });
                brokerRevChart.redraw();
            },
            cache: false
        });
    };

    /////////////////////////////////////////////////// Sales Revenue Ends here ///////////////////////////////////////////////////

    //by clicking the sales branches display its managers.
    $("#BranchId").change(function () {
        $("#ManagerId").empty();
        var selectedItem = $(this).val();
        if (selectedItem == '') {
            selectedItem = '0';
        }
        $.ajax({
            type: 'GET',
            url: '../Firm/GetBranchManagers',
            dataType: 'json',
            data: { "branchId": selectedItem },
            success: function (data) {
                jQuery.each(data, function (i, item) {
                    if (i == 0) {
                        jQuery("#ManagerId").append('<option value="0">All</option>');
                    }
                    jQuery("#ManagerId").append('<option value="' + item.UserMembershipId + '">' + item.Username + '</option>');
                });
            },
            error: function (ex) {
                //alert('Failed to retrieve subcategories.' + ex);
            }
        });
        return false;
    })

    //by clicking the sales manager display its brokers.
    $("#ManagerId").change(function () {
        $("#BrokerId").empty();
        var selectedItem = $(this).val();
        if (selectedItem == '') {
            selectedItem = '0';
        }
        $.ajax({
            type: 'GET',
            url: '../Firm/GetManagerBrokers',
            dataType: 'json',
            data: { "managerId": selectedItem },
            success: function (data) {
                jQuery.each(data, function (i, item) {
                    if (i == 0) {
                        jQuery("#BrokerId").append('<option value="0">All</option>');
                    }
                    jQuery("#BrokerId").append('<option value="' + item.tfs_memebership_userid + '">' + item.tfs_user_name + '</option>');
                });
            },
            error: function (ex) {
                //alert('Failed to retrieve subcategories.' + ex);
            }
        });
        return false;
    })

    //by clicking broker display its accounts /clients
    $("#BrokerId").change(function () {
        $("#AccountNick").empty();
        var selectedItem = $(this).val();
        if (selectedItem == '') {
            selectedItem = '0';
        }
        $.ajax({
            type: 'GET',
            url: '../Firm/GetBrokerAccounts',
            dataType: 'json',
            data: { "brokerId": selectedItem },
            success: function (data) {
                jQuery.each(data, function (i, item) {
                    if (i == 0) {
                        jQuery("#AccountNick").append('<option value="0">All</option>');
                    }
                    jQuery("#AccountNick").append('<option value="' + item.BrokerId + '">' + item.AccountNick + '</option>');
                });
            },
            error: function (ex) {
                //alert('Failed to retrieve subcategories.' + ex);
            }
        });
        return false;
    })


    

});
