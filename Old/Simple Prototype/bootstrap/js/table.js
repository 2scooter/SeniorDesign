function buildTable(name, address, phone, progress, completed) {

    document.write('<table border="1" cellspacing="10" cellpadding="5" width="1165">')

    document.write('<tr>')
    if (parent.getName() == true) {
        document.write('<td>Name</td>')
    }
    if (parent.getAddress() == true) {
        document.write('<td>Address</td>')
    }
    if (parent.getPhone() == true) {
        document.write('<td>Phone Number</td>')
    }
    if (parent.getProgress() == true) {
        document.write('<td>Progress</td>')
    }
    if (parent.getCompleted() == true) {
        document.write('<td>Completed</td>')
    }
    document.write('</tr>')
    for (i = 0; i < 50; i++) {
        document.write('<tr>')
        if (parent.getName() == true) {
            document.write('<td>firstname , lastname </td>')
        }

        if (parent.getAddress() == true) {
            document.write('<td>' + (i + 1).toString().charAt(0))
            document.write((i + 2).toString().charAt(0))
            document.write((i + 3).toString().charAt(0))
            document.write(' street </td>')
            document.write('<td>(' + i.toString().charAt(0))
            document.write((i + 1).toString().charAt(0))
            document.write((i + 2).toString().charAt(0))
            document.write(')')
        }

        if (parent.getPhone() == true) {
            document.write((i + 3).toString().charAt(0))
            document.write((i + 4).toString().charAt(0))
            document.write((i + 5).toString().charAt(0))
            document.write('-')
            document.write((i + 6).toString().charAt(0))
            document.write((i + 7).toString().charAt(0))
            document.write((i + 8).toString().charAt(0))
            document.write((i + 9).toString().charAt(0))
            document.write('</td>')
        }

        if (parent.getProgress() == true) {
            document.write('<td>')
            document.write(((i * i * i * i * i % 100) + 1) + '%')
            document.write('</td>')
        }

        if (parent.getCompleted() == true) {
            document.write('<td>')
            if (((i * i * i * i * i % 100) + 1) == 100) {
                document.write('true')
            }
            else {

                document.write('false')
            }
            document.write('</td>')
        }
        document.write('</td>')
    }

    document.write('</table>')
}