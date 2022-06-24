<%
        Integer counter = (Integer)session.getAttribute("counter");
        String heading = null;
        if (counter == null) {
            counter = new Integer(0);
        } else if (counter >=50) 
        {
            counter = new Integer(counter.intValue() + 5);
        }

        session.setAttribute("counter", counter);
        out.println(counter);
%>