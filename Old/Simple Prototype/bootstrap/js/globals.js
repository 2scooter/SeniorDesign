<script language="javascript" id="globals" type="text/javascript">        //globals?
        var name = true;
        var address = true;
        var phone = true;
        var progress = true;
        var completed = true;
        function invertName() {
            if (name == true) {
                name = false;
            }
            else {
                name = true;
            }
        }
        function invertAddress() {
            if (address == true) {
                address = false;
            }
            else {
                address = true;
            }
        }
        function invertPhone() {
            if (phone == true) {
                phone = false;
            }
            else {
                phone = true;
            }
        }
        function invertProgress() {
            if (progress == true) {
                progress = false;
            }
            else {
                progress = true;
            }
        }
        function invertCompleted() {
            if (completed == true) {
                completed = false;
            }
            else {
                completed = true;
            }
        }

        function getName() {
            return name;
        }
        function getAddress() {
            return address;
        }
        function getPhone() {
            return phone;
        }
        function getProgress() {
            return progress;
        }
        function getCompleted() {
            return completed;
        }
    </script>