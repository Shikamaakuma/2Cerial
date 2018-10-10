
GC1 = gcc
GC2 = g++ -std=c++11

ifeq ($(OS),Windows_NT)
    RM = del
    FILE_ENDING = .exe
    FORCE_FLAG = /f
    ADDITIONAL_FILES = *~
else
    RM = rm
    FILE_ENDING = 
    FORCE_FLAG = -f
    ADDITIONAL_FILES = 
endif

# define the compiler to use
CC = $(GC1)

# define any compile-time flags
# -g 		adds debugging information
# -Wall		turn on compiler warnings
CFLAGS = -g -O0 -DTESTING

# define any directories conaining header files other than /usr/include
INCLUDES = -Iinclude                                \

# define library paths in addition to /usr/lib
LFLAGS = \

# define any libraries to link into executable
LIBS = -lwiringPi                                   \
       -lm                                          \
	   -lcurl										\
	   

# define the source files
SOURCES =   main.c                                  \
            air_quality.c                           \
            grovepi.c                               \
			connection.c							\
			
# define the C object files 
#
# This uses Suffix Replacement within a macro:
#   $(name:string1=string2)
#         For each word in 'name' replace 'string1' with 'string2'
# Below we are replacing the suffix .c of all words in the macro SRCS
# with the .o suffix
#
OBJECTS = $(patsubst %.cpp,%.o,$(SOURCES:.c=.o))

# the build target
TARGET = airqual

#
# The following part of the makefile is generic; it can be used to 
# build any executable just by changing the definitions above and by
# deleting dependencies appended to the file from 'make depend'
#

.PHONY: depend clean clean_objects

all: $(TARGET)

$(TARGET): $(OBJECTS)
	$(CC) $(CFLAGS) $(INCLUDES) -o $(TARGET) $(OBJECTS) $(LFLAGS) $(LIBS)

# this is a suffix replacement rule for building .o's from .c's
# it uses automatic variables $<: the name of the prerequisite of
# the rule(a .c file) and $@: the name of the target of the rule (a .o file) 
# (see the gnu make manual section about automatic variables)
.c.o:
	$(CC) $(CFLAGS) $(INCLUDES) -c $< -o $@

clean_objects:
	$(RM) $(FORCE_FLAG) $(OBJECTS)

clean:  clean_objects
	$(RM) $(FORCE_FLAG) $(ADDITIONAL_FILES) $(TARGET)$(FILE_ENDING)

depend: $(SOURCES)
	makedepend $(INCLUDES) $^

# DO NOT DELETE THIS LINE -- make depend needs it
